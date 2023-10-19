<table class="table-fixed">
    <thead class="bg-gray divide-y divide-gray-200">
    <tr>
        <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            Naam Game
        </th>
        <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            Info Game
        </th>

    </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">

    <tr>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $aquarium->name }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $aquarium->description }}
        </td>
    </tr>

    </tbody>
</table>

