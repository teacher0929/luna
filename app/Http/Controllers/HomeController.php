<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $statuses = [
            'Beijing Warehouse',
            'Departed Beijing',
            'Arrived Ashgabat',
            'Ashgabat Warehouse',
            'Preparing',
            'Ready',
            'Delivered',
        ];

        return view('home.index');
    }
}
