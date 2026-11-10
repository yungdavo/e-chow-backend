<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function info(Request $request)
    {
        return response()->json([
            'id' => 1,
            'name' => 'Test Connection',
            'email' => 'test@test.com',
            'is_admin' => 1,
            'is_phone_verified' => 1,
            'created_at' => '2026-01-01',
            'updated_at' => '2026-01-01'
        ]);
    }
}
