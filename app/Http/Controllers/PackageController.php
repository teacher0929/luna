<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'transport' => ['nullable', 'integer', 'min:1'],
            'status' => ['nullable', 'integer', 'between:0,6'],
        ]);
        $f_transport = $request->has('transport') ? $request->transport : null;
        $f_status = $request->has('status') ? $request->status : null;

        $packages = Package::when(!auth()->user()->is_admin, function ($query) {
            return $query->where('user_id', auth()->id());
        })
            ->when(isset($f_transport), function ($query) use ($f_transport) {
                return $query->where('transport_id', $f_transport);
            })
            ->when(isset($f_status), function ($query) use ($f_status) {
                return $query->where('status', $f_status);
            })
            ->orderBy('id', 'desc')
            ->with('user', 'transport')
            ->paginate(10)
            ->withQueryString();

        return view('package.index')
            ->with([
                'packages' => $packages,
            ]);
    }


    public function show($id)
    {
        $package = Package::when(!auth()->user()->is_admin, function ($query) {
            return $query->where('user_id', auth()->id());
        })
            ->findOrFail($id);

        return view('package.show')
            ->with([
                'package' => $package,
            ]);
    }
}
