<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;

class PassengerController extends Controller
{
    public function index()
    {
        // Logic to fetch and display all drivers
        $passengers = Passenger::all();
        return view('passengers.index', ['passengers' => $passengers]);
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
