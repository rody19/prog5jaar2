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

<form id="searchForm" action="{{ route('search.index') }}" method="GET" class="mt-4">
        @csrf
        <div class="flex">
            <input type="text" name="query" id="query" placeholder="Search category by name" class="">
            <!-- Add a select field for tags -->
            <select name="category" id="category" class="">
                <option value="">No Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="">Search</button>
        </div>
    </form>

<div class="container">
    <h1>Product Page</h1>

        <div class="row">

        @foreach ($searchResults as $aquariums)

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $aquariums->name }}</h5>
                            <p class="card-text">{{ $aquariums->description }}</p>
                            @if ($aquariums->categories->count() > 0)
            <p class="card-text">
                Categories: {{ $aquariums->categories->pluck('name')->implode(', ') }}
            </p>
        @else
            <p class="card-text">Er zijn nu geen categories</p>
        @endif
{{--                            <a href="{{ route('product.show', ['id' => $aquariums->id]) }}" class="btn btn-primary">View Details</a>--}}

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>
@endsection
