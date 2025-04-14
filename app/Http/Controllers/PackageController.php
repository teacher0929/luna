<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('id', 'desc')
            ->with('user', 'transport')
            ->get();

        return view('package.index')
            ->with([
                'packages' => $packages,
            ]);
    }


    public function show($id)
    {
        $package = Package::findOrFail($id);

        return view('package.show')
            ->with([
                'package' => $package,
            ]);
    }
}
