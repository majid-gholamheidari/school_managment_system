<?php

namespace App\Http\Controllers\Web\Panel\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view('panel.sa.dashboard');
    }
}
