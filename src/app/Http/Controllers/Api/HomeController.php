<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function index()
    {
        return json_encode(['status' => 'succuss']);
    }
}
