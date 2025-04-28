<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin) {
            $transports = collect([
                [
                    'status' => 0,
                    'name' => 'Beijing Warehouse',
                    'count' => Transport::where('status', 0)->count(),
                ],
                [
                    'status' => 1,
                    'name' => 'Departed Beijing',
                    'count' => Transport::where('status', 1)->count(),
                ],
                [
                    'status' => 2,
                    'name' => 'Arrived Ashgabat',
                    'count' => Transport::where('status', 2)->count(),
                ],
                [
                    'status' => 3,
                    'name' => 'Ashgabat Warehouse',
                    'count' => Transport::where('status', 3)->count(),
                ],
            ]);
        } else {
            $transports = collect([]);
        }

        $packages = collect([
            [
                'status' => 0,
                'name' => 'Beijing Warehouse',
                'count' => Package::where('status', 0)->count(),
            ],
            [
                'status' => 1,
                'name' => 'Departed Beijing',
                'count' => Package::where('status', 1)->count(),
            ],
            [
                'status' => 2,
                'name' => 'Arrived Ashgabat',
                'count' => Package::where('status', 2)->count(),
            ],
            [
                'status' => 3,
                'name' => 'Ashgabat Warehouse',
                'count' => Package::where('status', 3)->count(),
            ],
            [
                'status' => 4,
                'name' => 'Preparing',
                'count' => Package::where('status', 4)->count(),
            ],
            [
                'status' => 5,
                'name' => 'Ready',
                'count' => Package::where('status', 5)->count(),
            ],
            [
                'status' => 6,
                'name' => 'Delivered',
                'count' => Package::where('status', 6)->count(),
            ],
        ]);

        return view('home.index')
            ->with([
                'transports' => $transports,
                'packages' => $packages,
            ]);
    }
}
