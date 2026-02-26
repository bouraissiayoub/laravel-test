<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        return view('properties.index', [
            'properties' => Property::latest()->paginate(9),
        ]);
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }
}
