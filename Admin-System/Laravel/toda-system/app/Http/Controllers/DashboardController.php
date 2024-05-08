<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Passenger;

class DashboardController extends Controller
{
    public function index()
    {
        // Logic to fetch and display all drivers
        $drivers = Driver::all();
        return view('drivers.index', ['drivers' => $drivers]);
    }

    public function getStatsPreview(){
        $totalDrivers = Driver::count();
        $totalUsers = Passenger::count();
        $totalTrips = Transaction::count();
        $totalAdmins = Admin::count();

        // Retrieve data for passengers per day
        $passengersPerPeriod = Transaction::selectRaw('CONCAT(drivers.first_name, " ", drivers.middle_name, " ", drivers.last_name) AS DriverName, DATE(transactions.date) AS TransactionDate, COUNT(*) AS PassengerCount')
        ->join('drivers', 'transactions.driver_id', '=', 'drivers.id')
        ->groupBy('DriverName', 'TransactionDate')
        ->get();

            // Query for frequent pickup points
        $frequentPickupPoints = Transaction::select('pickup_point', DB::raw('COUNT(*) as pickup_count'))
        ->groupBy('pickup_point')
        ->orderByDesc('pickup_count')
        ->limit(10) // Limit to top 10 frequent pickup points
        ->get();

        // Pass both sets of data to the view
        return view('layouts.dashboard', compact(
            'totalDrivers',
            'totalUsers',
            'totalTrips',
            'totalAdmins',
            'passengersPerPeriod',
            'frequentPickupPoints'
        ));
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
}
