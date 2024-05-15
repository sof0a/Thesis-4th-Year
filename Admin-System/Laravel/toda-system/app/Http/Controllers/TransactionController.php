<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Charts\TransactionChart;
use App\Models\butaos;
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
        $drivers = Driver::all();

        return view('transactions.create-payment', compact('drivers'));
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
        // $drivers = Driver::all();

        // $driverTransactions = Driver::select('drivers.id as driver_id', 'drivers.first_name', 'drivers.last_name', 'drivers.contact_number')
        //     ->leftJoin('transactions', 'drivers.id', '=', 'transactions.driver_id')
        //     ->selectRaw('COALESCE(COUNT(transactions.transaction_id), 0) as total_trips')
        //     ->selectRaw('COALESCE(SUM(transactions.fare_amount), 0) as total_earnings')
        //     ->groupBy('drivers.id', 'drivers.first_name', 'drivers.last_name', 'drivers.contact_number')
        //     ->paginate(10);

        // Get drivers with "Completed" status
        $completedDrivers = Driver::select('drivers.id as driver_id', 'drivers.first_name', 'drivers.last_name', 'drivers.contact_number')
            ->leftJoin('transactions', 'drivers.id', '=', 'transactions.driver_id')
            ->leftJoin('butaos', 'drivers.id', '=', 'butaos.driver_id')
            ->selectRaw('COALESCE(COUNT(transactions.transaction_id), 0) as total_trips')
            ->selectRaw('COALESCE(SUM(transactions.fare_amount), 0) as total_earnings')
            ->selectRaw('butaos.toda_commission, butaos.toda_paid, butaos.toda_balance, butaos.toda_payment_status')
            ->where('butaos.toda_payment_status', 'Completed')
            ->groupBy('drivers.id', 'drivers.first_name', 'drivers.last_name', 'drivers.contact_number', 'butaos.toda_commission', 'butaos.toda_paid', 'butaos.toda_balance', 'butaos.toda_payment_status')
            ->get();

        // Get drivers with "Pending" status
        $pendingDrivers = Driver::select('drivers.id as driver_id', 'drivers.first_name', 'drivers.last_name', 'drivers.contact_number')
            ->leftJoin('transactions', 'drivers.id', '=', 'transactions.driver_id')
            ->leftJoin('butaos', 'drivers.id', '=', 'butaos.driver_id')
            ->selectRaw('COALESCE(COUNT(transactions.transaction_id), 0) as total_trips')
            ->selectRaw('COALESCE(SUM(transactions.fare_amount), 0) as total_earnings')
            ->selectRaw('butaos.toda_commission, butaos.toda_paid, butaos.toda_balance, butaos.toda_payment_status')
            ->where('butaos.toda_payment_status', 'Pending')
            ->groupBy('drivers.id', 'drivers.first_name', 'drivers.last_name', 'drivers.contact_number', 'butaos.toda_commission', 'butaos.toda_paid', 'butaos.toda_balance', 'butaos.toda_payment_status')
            ->get();

        return view('transactions.driver', compact(
            'completedDrivers',
            'pendingDrivers'
        ));
    }

    // public function updatePayments(Request $request, Driver $id)
    // {
    //     try {
    //         // Validate the request data
    //         $validatedData = $request->validate([
    //             'toda_commission' => 'required|numeric|max:50',
    //             'toda_paid' => 'required|numeric|max:50',
    //             'toda_payment_status' => 'required|string|max:10',
    //         ]);

    //         // Calculate the TODA balance
    //         $balance = abs($validatedData['toda_paid'] - $validatedData['toda_commission']);

    //         if($balance == 0)
    //         {
    //             $validatedData['toda_payment_status'] = "Completed";
    //         }
    //         else {
    //             $validatedData['toda_payment_status'] = "Pending";
    //         }
    //         // if($validatedData['toda_payment_status'] == "Completed"){
    //             // $balance = 0;
    //         // }

    //         // Update the driver's TODA-related data
    //         // $id->update([
    //         //     'toda_commission' => $validatedData['toda_commission'],
    //         //     'toda_paid' => $validatedData['toda_paid'],
    //         //     'toda_balance' => $balance,
    //         //     'toda_payment_status' => $validatedData['toda_payment_status'],
    //         // ]);

    //         Butaos::update([
    //             'driver_id' => $id,
    //             'toda_commission' => $validatedData['toda_commission'],
    //             'toda_paid' => $validatedData['toda_paid'],
    //             'toda_balance' => $balance,
    //             'toda_payment_status' => $validatedData['toda_payment_status'],
    //             'date' => now(),
    //         ]);

    //         // Redirect back with a success message
    //         return redirect()->route('transactions.driver')->with('success', 'Driver payment status updated successfully');
    //     } catch (\Exception $e) {
    //         // Log the error
    //         logger()->error('Error updating driver: ' . $e->getMessage());

    //         // Redirect back with an error message
    //         return redirect()->route('transactions.driver')->with('error', 'Failed to update driver payment status');
    //     }
    // }

    public function updatePayments(Request$request, $driverId){
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'toda_commission' => 'required|numeric|max:50',
                'toda_paid' => 'required|numeric|max:50',
                // 'toda_payment_status' => 'nullable|string|max:10',
            ]);

            $payment_status = "";

            // Calculate the TODA balance
            $balance = abs($validatedData['toda_paid'] - $validatedData['toda_commission']);

            // Automatically set the payment status based on the balance
            // if ($balance == 0) {
            //     $validatedData['toda_payment_status'] = "Completed";
            // } else {
            //     $validatedData['toda_payment_status'] = "Pending";
            // }
            if ($balance == 0) {
                $payment_status = "Completed";
            } else {
                $payment_status = "Pending";
            }

            // Find existing Butao record for the driver or create a new one
            $butao = Butaos::where('driver_id', $driverId)->first();

            if ($butao) {
                // Update the existing record
                $butao->update([
                    'toda_commission' => $validatedData['toda_commission'],
                    'toda_paid' => $validatedData['toda_paid'],
                    'toda_balance' => $balance,
                    'toda_payment_status' => $payment_status,
                    // 'toda_payment_status' => $validatedData['toda_payment_status'],
                ]);
            } else {
                // Create a new record
                Butaos::create([
                    'driver_id' => $driverId,
                    'toda_commission' => $validatedData['toda_commission'],
                    'toda_paid' => $validatedData['toda_paid'],
                    'toda_balance' => $balance,
                    'toda_payment_status' => $validatedData['toda_payment_status'],
                    'date' => now()
                ]);
            }

            // Redirect back with a success message
            return redirect()->route('transactions.driver')->with('success', 'Driver status updated successfully');
        } catch (\Exception $e) {
            // Log the error
            logger()->error('Error updating driver: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->route('transactions.driver')->with('error', 'Failed to update driver payment status');
        }
    }

    public function createPayment()
    {
        return view('transactions.create-payment');
    }

    public function storeDriverPayment(Request $request)
    {
        $validatedData = $request->validate([
            'driver_id' => 'required|string|max:50',
            'toda_commission' => 'required|string|max:255',
            'toda_paid' => 'required|string|max:255',
            // 'toda_payment_status' => 'required|string|max:255',
            // 'toda_balance' => 'nullable|string|max:255',
        ]);

        $payment_status = "";

        $balance = abs($validatedData['toda_paid'] - $validatedData['toda_commission']);

        if ($balance == 0) {
            $payment_status = "Completed";
        } else {
            $payment_status = "Pending";
        }

        butaos::create([
            'driver_id' => $validatedData['driver_id'],
            'toda_commission' => $validatedData['toda_commission'],
            'toda_paid' => $validatedData['toda_paid'],
            'toda_balance' => $balance,
            'toda_payment_status' => $payment_status,
            'created_at' => now(),
        ]);

        return redirect()->route('transactions.driver')->with('success', 'Payment recorded successfully.');
    }



}
