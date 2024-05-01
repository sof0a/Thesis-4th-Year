<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;
use App\Models\Transaction;
// use DB;
use Illuminate\Support\Facades\DB;


class AnalyticsController extends Controller
{

    public function analytics()
    {
        // Retrieve data for passengers per day
        $passengersPerDay = Transaction::selectRaw('CONCAT(drivers.first_name, " ", drivers.middle_name, " ", drivers.last_name) AS DriverName, DATE(transactions.date) AS TransactionDate, COUNT(*) AS PassengerCount')
            ->join('drivers', 'transactions.driver_id', '=', 'drivers.id')
            ->groupBy('DriverName', 'TransactionDate')
            ->get();

        // Query to calculate daily TODA profit
        $dailyProfit = Transaction::selectRaw('DATE(date) AS transaction_date, SUM(fare_amount) AS total_profit')
            ->groupBy('transaction_date')
            ->orderBy('transaction_date')
            ->get();

        // Query for earnings per driver
        $earningsPerDriver = DB::table('drivers')
        ->select(DB::raw('CONCAT(drivers.first_name, " ", drivers.middle_name, " ", drivers.last_name) AS DriverName'), DB::raw('SUM(transactions.fare_amount) AS TotalEarnings'))
        ->join('transactions', 'drivers.id', '=', 'transactions.driver_id')
        ->groupBy('DriverName')
        ->get();

        // Query for frequent pickup points
        $frequentPickupPoints = Transaction::select('pickup_point', DB::raw('COUNT(*) as pickup_count'))
        ->groupBy('pickup_point')
        ->orderByDesc('pickup_count')
        ->limit(10) // Limit to top 10 frequent pickup points
        ->get();

        // Pass both sets of data to the view
        return view('layouts.analytics', compact(
            'passengersPerDay',
            'dailyProfit',
            'earningsPerDriver',
            'frequentPickupPoints'
        ));
    }





}


?>
