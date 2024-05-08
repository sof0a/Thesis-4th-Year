<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AnalyticsController extends Controller
{

    public function analytics(Request $request)
{
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

    // Define filter options
    $filterOptions = [
        'daily' => 'Daily',
        'weekly' => 'This Week',
        'monthly' => 'This Month',
        'yearly' => 'This Year',
        // 'custom' => 'Custom Range',
    ];

    // Default filter to daily
    $filter = $request->input('filter', 'daily');

    


    switch ($filter) {
        case 'weekly':
            // Handle weekly filter
            $startOfWeek = Carbon::now()->startOfWeek()->toDateString();
            $endOfWeek = Carbon::now()->endOfWeek()->toDateString();

            $passengersPerPeriod = Transaction::selectRaw('CONCAT(drivers.first_name, " ", drivers.middle_name, " ", drivers.last_name) AS DriverName, DATE(transactions.date) AS TransactionDate, COUNT(*) AS PassengerCount')
                ->join('drivers', 'transactions.driver_id', '=', 'drivers.id')
                ->whereBetween('transactions.date', [$startOfWeek, $endOfWeek])
                ->groupBy('DriverName', 'TransactionDate')
                ->get();

            $frequentPickupPoints = $this->getFrequentPickupPoints($startOfWeek, $endOfWeek);
            $driverEarnings = $this->getDriverEarnings($startOfWeek, $endOfWeek);
            $todaProfit = $this->getTodaProfit($startOfWeek, $endOfWeek);

            break;
        case 'monthly':
            // Handle monthly filter
            $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
            $endOfMonth = Carbon::now()->endOfMonth()->toDateString();

            $passengersPerPeriod = Transaction::selectRaw('CONCAT(drivers.first_name, " ", drivers.middle_name, " ", drivers.last_name) AS DriverName, DATE(transactions.date) AS TransactionDate, COUNT(*) AS PassengerCount')
                ->join('drivers', 'transactions.driver_id', '=', 'drivers.id')
                ->whereBetween('transactions.date', [$startOfMonth, $endOfMonth])
                ->groupBy('DriverName', 'TransactionDate')
                ->get();

            $frequentPickupPoints = $this->getFrequentPickupPoints($startOfMonth, $endOfMonth);
            $driverEarnings = $this->getDriverEarnings($startOfMonth, $endOfMonth);
            $todaProfit = $this->getTodaProfit($startOfMonth, $endOfMonth);

            break;
        case 'yearly':
            // Handle yearly filter
            $startOfYear = Carbon::now()->startOfYear()->toDateString();
            $endOfYear = Carbon::now()->endOfYear()->toDateString();

            $passengersPerPeriod = Transaction::selectRaw('CONCAT(drivers.first_name, " ", drivers.middle_name, " ", drivers.last_name) AS DriverName, DATE(transactions.date) AS TransactionDate, COUNT(*) AS PassengerCount')
                ->join('drivers', 'transactions.driver_id', '=', 'drivers.id')
                ->whereBetween('transactions.date', [$startOfYear, $endOfYear])
                ->groupBy('DriverName', 'TransactionDate')
                ->get();

            $frequentPickupPoints = $this->getFrequentPickupPoints($startOfYear, $endOfYear);
            $driverEarnings = $this->getDriverEarnings($startOfYear, $endOfYear);
            $todaProfit = $this->getTodaProfit($startOfYear, $endOfYear);

            break;
        case 'custom':
            // Handle custom range filter
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            // Validate input dates

            $passengersPerPeriod = Transaction::selectRaw('CONCAT(drivers.first_name, " ", drivers.middle_name, " ", drivers.last_name) AS DriverName, DATE(transactions.date) AS TransactionDate, COUNT(*) AS PassengerCount')
                ->join('drivers', 'transactions.driver_id', '=', 'drivers.id')
                ->whereBetween('transactions.date', [$startDate, $endDate])
                ->groupBy('DriverName', 'TransactionDate')
                ->get();

            $frequentPickupPoints = $this->getFrequentPickupPoints($startDate, $endDate);
            $driverEarnings = $this->getDriverEarnings($startDate, $endDate);
            $todaProfit = $this->getTodaProfit($startDate, $endDate);

            break;
        case 'daily':
        default:
            $today = date('Y-m-d');

            $passengersPerPeriod = Transaction::selectRaw('CONCAT(drivers.first_name, " ", drivers.middle_name, " ", drivers.last_name) AS DriverName, DATE(transactions.date) AS TransactionDate, COUNT(*) AS PassengerCount')
                ->join('drivers', 'transactions.driver_id', '=', 'drivers.id')
                ->whereDate('transactions.date', $today)
                ->groupBy('DriverName', 'TransactionDate')
                ->get();

            $frequentPickupPoints = $this->getFrequentPickupPoints($today, $today);
            $driverEarnings = $this->getDriverEarnings($today, $today);
            $todaProfit = $this->getTodaProfit($today, $today);

            break;
    }

    // Pass both sets of data to the view
    return view('layouts.analytics', compact(
        'filterOptions',
        'filter',
        'passengersPerPeriod',
        'dailyProfit',
        'earningsPerDriver',
        'frequentPickupPoints'
    ));
}



private function getFrequentPickupPoints($startDate, $endDate) {
    return Transaction::select('pickup_point', DB::raw('COUNT(*) as pickup_count'))
        ->whereBetween('date', [$startDate, $endDate])
        ->groupBy('pickup_point')
        ->orderByDesc('pickup_count')
        ->limit(10)
        ->get();
}

private function getDriverEarnings($startDate, $endDate) {
    return DB::table('drivers')
        ->select(DB::raw('CONCAT(drivers.first_name, " ", drivers.middle_name, " ", drivers.last_name) AS DriverName'), DB::raw('SUM(transactions.fare_amount) AS TotalEarnings'))
        ->join('transactions', 'drivers.id', '=', 'transactions.driver_id')
        ->whereBetween('transactions.date', [$startDate, $endDate])
        ->groupBy('DriverName')
        ->get();
}

private function getTodaProfit($startDate, $endDate) {
    return Transaction::selectRaw('DATE(date) AS transaction_date, SUM(fare_amount) AS total_profit')
        ->whereBetween('date', [$startDate, $endDate])
        ->groupBy('transaction_date')
        ->orderBy('transaction_date')
        ->get();
}











}


?>
