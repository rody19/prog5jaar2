{{--<link rel="shortcut icon" href="{{ asset('images/frans.jpg') }}" type='image/x-icon'>--}}
@extends('layouts.app')
@section('content')
<a href="{{ route('aquarium.create') }}">
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
    @foreach($aquarium as $aquariums)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{ $aquariums->id }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $aquariums->name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $aquariums->description }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <a href="{{ route('aquarium.show', ['aquarium' => $aquariums -> id]) }}"> Details </a>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
{{--                <a href="{{ route('aquarium.update', $aquariums -> id) }}"> update </a>--}}
                <a href="{{ route('aquarium.update', $aquariums->id) }}"> update </a>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                <a href="{{ route('aquarium.delete', $aquariums->id) }}"> delete </a>
            </td>

        </tr>
@endforeach
@endsection
