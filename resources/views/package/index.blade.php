@extends('layouts.app')
@section('title')
    Packages
@endsection
@section('content')
    <div class="h3">
        Packages
    </div>

    <table class="table table-striped table-hover table-sm">
        <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Transport</th>
            <th>Code</th>
            <th>Weight</th>
            <th>Price</th>
            <th>Status</th>
            <th>Payment</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($packages as $package)
            <tr>
                <td>{{ $package->id }}</td>
                <td>{{ $package->user->getName() }}</td>
                <td class="font-monospace">{{ $package->transport->getName() }}</td>
                <td class="font-monospace">
                    <div>{{ $package->code }}</div>
                    <div>{{ $package->barcode }}</div>
                </td>
                <td>
                    <div>{{ $package->weight }}</div>
                    <div>{{ $package->weight_price }}</div>
                </td>
                <td>{{ $package->total_price }}</td>
                <td>{{ $package->getStatus() }}</td>
                <td class="table-{{ $package->getPaymentStatusColor() }}">{{ $package->getPaymentStatus() }}</td>
                <td>
                    <a href="{{ route('packages.show', $package->id) }}" class="btn btn-light btn-sm">Show</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
