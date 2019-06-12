<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function index (Request $request)
    {
        return $request->user();
    }
    public function create (Request $request, $server_key_id)
    {
        return $server_key_id;
    }
}
