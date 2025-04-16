<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $transports = Transport::orderBy('id', 'desc')
            ->withCount('packages')
            ->paginate(10)
            ->withQueryString();

        return view('transport.index')
            ->with([
                'transports' => $transports,
            ]);
    }
}
