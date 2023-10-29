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
                    {{ __('Je bent ingelogd, Nieuwe gebruikers moeten minimaal 2 andere aquariums bezoeken. Voordat een comment geplaatst kan worden') }}
                </div>
            </div>
        </div>
    </div>
</div>

<form id="searchForm" action="{{ route('search.index') }}" method="GET" class="mt-4">
    @csrf
    <div class="flex">
        <input type="text" name="query" id="query" placeholder="Search aquaria by name" class="form-control">
        <select name="category" id="category" class="form-select">
            <option value="">No Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>

<div class="container mt-4">
    <h1 class="text-center mb-4">Product Page</h1>
    @if (count($aquarium) > 0)
        <div class="row">
            @foreach ($aquarium->where('aquarium_status', true) as $aquariums)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $aquariums->image_url }}" class="card-img-top" alt="{{ $aquariums->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $aquariums->name }}</h5>
                            <p class="card-text">{{ $aquariums->description }}</p>
                            @if ($aquariums->categories->count() > 0)
                                <p class="card-text">
                                    Categories: {{ $aquariums->categories->pluck('name')->implode(', ') }}
                                </p>
                            @else
                                <p class="card-text">No categories available</p>
                            @endif
                            <a href="{{ route('comments.show', ['aquarium' => $aquariums->id]) }}"
                                class="btn btn-primary mt-3">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">No aquariums available.</p>
    @endif
</div>
@endsection
