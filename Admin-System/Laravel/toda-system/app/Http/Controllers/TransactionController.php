<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Charts\TransactionChart;
use App\Models\Passenger;
use App\Models\Driver;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    // public function index()
    // {
    //     $transactions = Transaction::all();

    //     return view('layouts.transactions', compact('transactions'));
    // }

    public function index()
    {
        // Logic to fetch and display all transactions
        $transactions = Transaction::all();
        $drivers = Driver::all();

        // Get the count of transactions for each passenger
        // $passengerTrips = DB::table('transactions')
        //     ->select('passenger_id', DB::raw('COUNT(*) as transaction_count'))
        //     ->groupBy('passenger_id')
        //     ->get();

        // Get the count of transactions for each passenger along with passenger name
        // $passengerTrips = DB::table('transactions')
        //     ->join('passengers', 'transactions.passenger_id', '=', 'passengers.passenger_id')
        //     ->select('transactions.passenger_id', 'passengers.name', DB::raw('COUNT(*) as transaction_count'))
        //     ->groupBy('transactions.passenger_id', 'passengers.name')
        //     ->get();

        return view('layouts.transactions', compact('transactions', ''));
    }

    public function getPassengersTransaction(){
        // Get passenger transactions along with passenger details and total trips
        $passengerTransactions = Transaction::select('passengers.passenger_id as passenger_id', 'passengers.name', 'passengers.contact_number')
            ->selectSub(function ($query) {
                $query->selectRaw('COUNT(*)')
                    ->from('transactions')
                    ->whereColumn('passenger_id', 'passengers.passenger_id')
                    ->groupBy('passenger_id');
            }, 'total_trips')
            ->join('passengers', 'transactions.passenger_id', '=', 'passengers.passenger_id')
            ->groupBy('passenger_id', 'passengers.name', 'passengers.contact_number')
            ->orderBy('transactions.date', 'desc')
            ->paginate(10);

            return view('transactions.passenger', compact('passengerTransactions'));
    }


    public function getDriversTransaction(){
        $drivers = Driver::all();

        $driverTransactions = Driver::select('drivers.id as driver_id', 'drivers.first_name', 'drivers.last_name', 'drivers.contact_number')
            ->leftJoin('transactions', 'drivers.id', '=', 'transactions.driver_id')
            ->selectRaw('COALESCE(COUNT(transactions.transaction_id), 0) as total_trips')
            ->selectRaw('COALESCE(SUM(transactions.fare_amount), 0) as total_earnings')
            ->groupBy('drivers.id', 'drivers.first_name', 'drivers.last_name', 'drivers.contact_number')
            ->paginate(10);

        // return view('transactions.driver', ['driverTransactions' => $driverTransactions]);
        return view('transactions.driver', compact(
            'driverTransactions',
            'drivers'
        ));
    }

    // public function getDriversTransaction(){
    //     $drivers = Driver::all();


    //     $driverTransactions = Driver::select(
    //         'drivers.id as driver_id',
    //         'drivers.first_name',
    //         'drivers.last_name',
    //         'drivers.contact_number',
    //         'drivers.toda_paid' // Include toda_paid in the select statement
    //     )
    //     ->leftJoin('transactions', 'drivers.id', '=', 'transactions.driver_id')
    //     ->selectRaw('COALESCE(COUNT(transactions.transaction_id), 0) as total_trips')
    //     ->selectRaw('COALESCE(SUM(transactions.fare_amount), 0) as total_earnings')
    //     ->groupBy(
    //         'drivers.id',
    //         'drivers.first_name',
    //         'drivers.last_name',
    //         'drivers.contact_number',
    //         'drivers.toda_paid' // Include toda_paid in the group by clause
    //     )
    //     ->paginate(10);



    //     return view('transactions.driver', compact(
    //         'driverTransactions',
    //         'drivers'
    //     ));
    // }



    // public function updatePayments(Request $request, $id)
    // {
    //     $driver = Driver::findOrFail($id);

    //     // Get the commission and paid amount from the request
    //     $commission = $request->input('toda_commission');
    //     $paid = $request->input('toda_paid');

    //     // Calculate the balance
    //     $balance = abs($paid - $commission); // Absolute value to ensure it's positive

    //     // Update driver's data
    //     $driver->toda_commission = $commission;
    //     $driver->toda_paid = $paid;
    //     $driver->toda_balance = $balance;
    //     $driver->toda_payment_status = $request->input('toda_payment_status');

    //     // Save the changes
    //     $driver->save();

    //     return redirect()->back()->with('success', 'Driver status updated successfully');
    // }



    public function updatePayments(Request $request, Driver $id)
    {
        try {
        // dd('Update method called for ID: ' . $id);

        // Validate the request data
        $validatedData = $request->validate([
            'toda_commission' => 'required|numeric|max:50',
            'toda_paid' => 'required|numeric|max:50',
            'toda_payment_status' => 'required|string|max:10',
        ]);

        // Calculate the TODA balance
        $balance = abs($validatedData['toda_paid'] - $validatedData['toda_commission']);

        if($balance == 0){
            $validatedData['toda_payment_status'] = "Completed";
        }else{
            $validatedData['toda_payment_status'] = $validatedData['toda_payment_status'];
        }

        // Update the driver's TODA-related data
        $id->update([
            'toda_commission' => $validatedData['toda_commission'],
            'toda_paid' => $validatedData['toda_paid'],
            'toda_balance' => $balance,
            'toda_payment_status' => $validatedData['toda_payment_status'],
        ]);

        // Redirect back with a success message
        return redirect()->route('transactions.driver')->with('success', 'Driver status updated successfully');
    } catch (\Exception $e) {
        // Log the error
        logger()->error('Error updating driver: ' . $e->getMessage());

        // Redirect back with an error message
        return redirect()->route('transactions.driver')->with('error', 'Failed to update driver status');
    }
    }



}
