<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Policy::where('is_active', 1)->get()], 200);
    }

    public function show($id)
    {
        return response()->json(['data' => Policy::with(['client', 'insurance'])->findOrFail($id)], 200);
    }
}
