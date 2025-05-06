<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $title = 'Dashboard';
        $breadCrumbs = 'Dashboard';
        return view('pages.dashboard.index', compact('title','breadCrumbs'));
    }
}
