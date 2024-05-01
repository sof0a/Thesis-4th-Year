<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    public function index()
    {
        // Logic to fetch and display all drivers
        $drivers = Driver::all();
        return view('layouts.drivers', ['drivers' => $drivers]);
    }

    public function show($id)
    {
        $driver = Driver::find($id);
        // $driver = Driver::findOrFail($driver_id);
        return view('drivers.show', compact('driver'));
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'contact_number' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'model' => 'required|string|max:50',
            'plate_number' => 'required|string|max:10',
        ]);

        // $post = new Driver();
        // $post->first_name = $request->fName;
        // $post->last_name = $request->lName;
        // $post->middle_name = $request->mName;
        // $post->contact_number = $request->contactNum;
        // $post->license_number = $request->licenseNum;
        // $post->model = $request->model;
        // $post->plate_number = $request->plateNum;
        // $post->save();
        $post = new Driver();
        $post->first_name = $request->first_name;
        $post->last_name = $request->last_name;
        $post->middle_name = $request->middle_name;
        $post->contact_number = $request->contact_number;
        $post->license_number = $request->license_number;
        $post->model = $request->model;
        $post->plate_number = $request->plate_number;
        $post->save();

        // $driver = new Driver();
        // $driver->fill($validatedData);
        // $driver->save();x

        return redirect()->route('layouts.drivers')->with('success', 'Driver created successfully.');
    }

    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, Driver $id)
    {
        // dd($request->all());

        // Validate the request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'license_number' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'model' => 'required|string|max:50',
            'plate_number' => 'required|string|max:10',
        ]);

        // Find the driver by driver_id
        // $driver = Driver::findOrFail($driver_id);

        // Update the driver with the validated data
        $id->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('layouts.drivers')->with('success', 'Driver updated successfully');
    }

    public function destroy(Driver $id)
    {
        // Delete driver record
        $id->delete();

        return redirect()->route('layouts.drivers')->with('success','Driver deleted successfully');
    }

}
