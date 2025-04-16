@extends('layouts.app')
@section('title')
    Transports
@endsection
@section('content')
    <div class="h3">
        Transports
    </div>

    <table class="table table-striped table-hover table-sm">
        <thead>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th class="w-50">Note</th>
            <th>Status</th>
            <th>Packages count</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($transports as $transport)
            <tr>
                <td>{{ $transport->id }}</td>
                <td class="font-monospace text-danger">{{ $transport->code }}</td>
                <td class="small">{{ $transport->note }}</td>
                <td>{{ $transport->getStatus() }}</td>
                <td>
                    <a href="{{ route('packages.index', ['transport' => $transport->id]) }}" class="btn btn-light btn-sm">
                        {{ $transport->packages_count }}
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
