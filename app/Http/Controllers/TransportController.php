<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'status' => ['nullable', 'integer', 'between:0,3'],
        ]);
        $f_status = $request->has('status') ? $request->status : null;

        $transports = Transport::when(isset($f_status), function ($query) use ($f_status) {
            return $query->where('status', $f_status);
        })
            ->orderBy('id', 'desc')
            ->withCount('packages')
            ->paginate(10)
            ->withQueryString();

        return view('transport.index')
            ->with([
                'transports' => $transports,
            ]);
    }
}
