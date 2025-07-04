<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function info (Request $request)
    {
    
        return response()->json($request->user());
    }
}
