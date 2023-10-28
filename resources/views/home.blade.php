@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h1>Product Page</h1>
    @if (count($aquarium) > 0)
        <div class="row">

                @foreach ($aquarium->where('aquarium_status', true) as $aquariums)

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $aquariums->name }}</h5>
                            <p class="card-text">{{ $aquariums->description }}</p>
{{--                            <a href="{{ route('product.show', ['id' => $aquariums->id]) }}" class="btn btn-primary">View Details</a>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No aquariums available.</p>
    @endif
</div>
@endsection
