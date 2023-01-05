<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Models\CoOrdinate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoOrdinateController extends Controller
{
    public function store(Request $request)
    {
        CoOrdinate::create([
            "user_id" => $request->user()->id,
            "x" => $request->x,
            "y" => $request->y
        ]);

        $response = [
            "user_id" => $request->user()->id,
            "x" => $request->x,
            "y" => $request->y
        ];

        return response()->json($response, 200);
    }
}
