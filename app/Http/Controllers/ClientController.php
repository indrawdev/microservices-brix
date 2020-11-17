<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Client::where('is_active', 1)->get()], 200);
    }

    public function show($id)
    {
        return response()->json(['data' => Client::with(['policies'])->findOrFail($id)], 200);
    }

}
