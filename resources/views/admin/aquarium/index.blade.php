<link rel="shortcut icon" href="{{ asset('images/frans.jpg') }}" type='image/x-icon'>

<a href="{{ route('aquarium.create') }}">
    <button
        class="ml-6 py-2 block border-b-2 border-transparent
        focus:outline-none font-medium capitalize text-center
        focus:text-green-500 focus:border-green-500
        dark-focus:text-green-200 dark-focus:border-green-200
        transition duration-500 ease-in-out">
        Create
    </button>
</a>


<table class="table-fixed">
    <thead class="bg-gray divide-y divide-gray-200">
    <tr>
        <th class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            Aquariums
        </th>
        <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            Naam vissen
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
