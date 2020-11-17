<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Dependent;

class MemberController extends Controller
{
    public function index($policy)
    {
        $members = Member::where(['policy_id' => $policy, 'is_active' => 1])->get();
        return response()->json(['data' => $members], 200);
    }

    public function show($id)
    {
        return response()->json(['data' => Member::findOrFail($id)], 200);
    }

    public function dependents($id)
    {
        $dependents = Dependent::where('member_id', $id)->get();
        return response()->json(['data' => $dependents], 200);
    }

}
