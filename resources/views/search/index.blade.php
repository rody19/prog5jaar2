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
    <div class="flex justify-center">
        <div class="input-group mb-3">
            <input type="text" name="query" id="query" placeholder="Search category by name" class="form-control" aria-label="Search">
            <!-- Add a select field for categories -->
            <select name="category" id="category" class="form-select">
                <option value="">No Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>

<div class="container mt-4">
    <h1 class="text-center mb-4">Product Page</h1>
    <div class="row">
        @foreach ($searchResults as $aquariums)
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
                        <a href="{{ route('comments.show', ['aquarium' => $aquariums->id]) }}" class="btn btn-primary mt-3">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
