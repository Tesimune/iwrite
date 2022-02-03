<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->Middleware(['auth']);
    }
    //
    public function index()
    {
        return view('dashboard');
    }
}
