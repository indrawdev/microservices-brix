<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cashless;
use App\Models\CashlessDetail;

class CashlessController extends Controller
{
    public function index($policy)
    {
        $cashlesses = Cashless::where(['is_active' => 1, 'policy_id' => $policy])->get();
        return response()->json(['data' => $cashlesses], 200);
    }

    public function show($id)
    {
        return response()->json(['data' => Cashless::with(['details'])->findOrFail($id)], 200);
    }

    public function details($code)
    {
        return response()->json(['data' => CashlessDetail::where('batch_code', $code)->get()], 200);
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
