<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function dashboard($role) 
    {
        switch($role) {
            case 'admin':
                return view("dashboard.admin");
                break;

            case 'manager':
                return view("dashboard.manager");
                break;

        }
    }
}
