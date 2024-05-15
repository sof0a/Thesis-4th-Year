<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Transaction;
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
            'rfid' => 'required|string|max:50',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'contact_number' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'model' => 'required|string|max:50',
            'plate_number' => 'required|string|max:10',
        ]);

        // Handle file upload
        // if ($request->hasFile('image')) {
        //     // Get file name with extension
        //     $filenameWithExt = $request->file('image')->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     // Get just extension
        //     $extension = $request->file('image')->getClientOriginalExtension();
        //     // Filename to store
        //     $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //     // Upload image
        //     $path = $request->file('image')->storeAs('public/images/driver', $fileNameToStore);
        // } else {
        //     $fileNameToStore = 'noimage.jpg'; // Default image if no image is uploaded
        // }

        $post = new Driver();
        $post->rfid = $request->rfid;
        $post->first_name = $request->first_name;
        $post->last_name = $request->last_name;
        $post->middle_name = $request->middle_name;
        $post->contact_number = $request->contact_number;
        $post->license_number = $request->license_number;
        $post->model = $request->model;
        $post->plate_number = $request->plate_number;
        $post->save();

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
            'rfid' => 'required|string|max:50',
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

    public function delete(Driver $id)
    {
         // Delete related transactions
        // Transaction::where('driver_id', $id->id)->delete();

        // Delete driver record
        $id->delete();

        return redirect()->route('layouts.drivers')->with('success','Driver deleted successfully');
    }

}
