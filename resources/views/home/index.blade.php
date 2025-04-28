@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    @if($transports->count() > 0)
        <div class="h3 mb-3">
            Transports
        </div>
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2 g-sm-3 mb-4">
            @foreach($transports as $transport)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="fs-5">{{ $transport['name'] }}</div>
                            <div class="fs-2 text-end">
                                <a href="{{ route('transports.index', ['status' => $transport['status']]) }}" class="stretched-link link-dark text-decoration-none">
                                    {{ $transport['count'] }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="h3 mb-3">
        Packages
    </div>
    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2 g-sm-3">
        @foreach($packages->sortByDesc('count') as $package)
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="fs-5">{{ $package['name'] }}</div>
                        <div class="fs-2 text-end">
                            <a href="{{ route('packages.index', ['status' => $package['status']]) }}" class="stretched-link link-dark text-decoration-none">
                                {{ $package['count'] }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
