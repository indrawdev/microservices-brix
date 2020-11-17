<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insurance;

class InsuranceController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Insurance::where('is_active', 1)->get()], 200);
    }

    public function show($id)
    {
        return response()->json(['data' => Insurance::with(['policies'])->findOrFail($id)], 200);
    }
}
