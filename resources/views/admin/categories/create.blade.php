<form id="form" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4" action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Name
        </label>

        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" name="name" id="name" value="{{ old('name') }}" type="text">
    </div>

    <div class="flex item-center justifiy-between">
        <button id="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Submit
        </button>
    </div>
</form>
</div>
