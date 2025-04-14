<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//        return User::with('packages')->findOrFail(1);

//        return Package::where('user_id', 1)->where('payment_status', 0)->count();

//        return User::withCount([
//            'packages as unpaid_packages_count' => function ($query) {
//                $query->where('payment_status', 0);
//            }, 'packages as paid_packages_count' => function ($query) {
//                $query->where('payment_status', 1);
//            }])
//            ->get();

//        return User::inRandomOrder()->first();

//        return Package::with('user', 'transport', 'actions')->first();

        return view('home.index');
    }
}
