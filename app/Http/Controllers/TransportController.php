<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TransportController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('is_admin', only: ['index']),
        ];
    }

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
