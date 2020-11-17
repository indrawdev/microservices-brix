<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(['data' => User::where('is_active', 1)->get()], 200);
    }

    public function show($id)
    {
        return response()->json(['data' => User::with('client')->findOrFail($id)], 200);
    }
}
