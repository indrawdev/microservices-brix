<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reimburse;
use App\Models\ReimburseDetail;

class ReimburseController extends Controller
{
    public function index($policy)
    {
        $reimburses = Reimburse::where(['is_active' => 1, 'policy_id' => $policy])->get();
        return response()->json(['data' => $reimburses], 200);
    }

    public function show($id)
    {
        return response()->json(['data' => Reimburse::with('details')->findOrFail($id)], 200);
    }

    public function details($code)
    {
        return response()->json(['data' => ReimburseDetail::where('batch_code', $code)->get()], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required',
            'policy_id' => 'required',
            'total_claim' => 'required'
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
