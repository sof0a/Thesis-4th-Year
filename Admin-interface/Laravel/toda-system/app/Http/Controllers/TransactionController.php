<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Charts\TransactionChart;

class TransactionController extends Controller
{
    // public function index()
    // {
    //     // Logic to fetch and display all drivers
    //     $transactions = Transaction::all();

    //     return view('analytics.passenger_graph', compact('transactions'));
    // }

    public function index()
    {
        // Logic to fetch and display all drivers
        $transactions = Transaction::all();

        $chart = new TransactionChart;
        $chart->labels(['One', 'Two', 'Three']);
        $chart->dataset('My dataset 1', 'line', [1, 2, 3, 4]);





        
        return view('analytics.passenger_graph', compact('transactions', 'chart'));
    }

    public function create()
    {
        // Logic to show the form for creating a new driver
    }

    public function store(Request $request)
    {
        // Logic to store a newly created driver in the database
    }

    public function show($id)
    {
        // Logic to display the details of a specific driver
    }

    public function edit($id)
    {
        // Logic to show the form for editing a driver
    }

    public function update(Request $request, $id)
    {
        // Logic to update the specified driver in the database
    }

    public function destroy($id)
    {
        // Logic to remove the specified driver from the database
    }







    public function countTransactions(Request $request)
    {
        // Specify the date for which you want to count transactions
        $date = '2024-04-17'; // Replace this with your specific date

        // Query to count transactions for the specified date
        $transactionCount = Transaction::whereDate('created_at', $date)->count();

        // Return the count or use it as needed
        // return response()->json(['transaction_count' => $transactionCount]);
        // return view('analytics', ['transactionCount' => $transactionCount]);
        return view('analytics.passenger_graph', compact('transactionCount'));
    }

    // public function getDailyPassengerCount(){
    //     // Specify the date for which you want to count transactions
    //     $date = '2024-04-15'; // Replace this with your specific date

    //     // Query to count transactions for the specified date
    //     $transactionCount = Transaction::whereDate('created_at', $date)->count();

    //     // Output the count
    //     echo "Number of transactions on $date: $transactionCount";
    // }
}
