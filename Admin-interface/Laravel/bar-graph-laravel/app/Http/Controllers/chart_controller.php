<?php

namespace App\Http\Controllers;

use App\Models\DummyData;
use Illuminate\Http\Request;

class chart_controller extends Controller
{
    public function barChart()
    {
        // Replace this with your actual data retrieval logic
        $data = [
            // 'labels' => DummyData::all()
            'labels' => DummyData::pluck('name'),
            'data' => DummyData::pluck('profit')
        ];

        

        return view('bar-chart', compact('data'));
    }
}
