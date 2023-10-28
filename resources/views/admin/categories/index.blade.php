{{--<link rel="shortcut icon" href="{{ asset('images/frans.jpg') }}" type='image/x-icon'>--}}
@extends('layouts.app')
@section('content')
<a href="{{ route('categories.create') }}">
    <button
        class="">
        Create aquarium
    </button>
</a>
<a href="{{ route('home') }}">
    <button
        class="">
        user home
    </button>
</a>



<table class="table-fixed">
    <thead class="bg-gray divide-y divide-gray-200">
    <tr>
        <th class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            Aquariums
        </th>
        <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

        </th>
        <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            Info vissen
        </th>

    </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach($categories as $category)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{ $category->id }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $category->name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <a href="{{ route('categories.show', ['category' => $category->id]) }}">Details</a>
            </td>


            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <a href="{{ route('categories.update', ['category' => $category->id]) }}">Update</a>
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                <a href="{{ route('categories.delete', $category->id) }}">Delete</a>

            </td>


        </tr>
@endforeach
@endsection
