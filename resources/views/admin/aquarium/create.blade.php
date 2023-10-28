<form id="form" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4" action="{{ route('aquarium.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Name
        </label>

        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" name="name" id="name" value="{{ old('name') }}" type="text">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
            Description
        </label>

        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror" name="description" id="description" value="{{ old('description') }}" type="text">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
            Tags
        </label>
        <div class="relative">
            <select name="categories[]" id="categories" class="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="flex item-center justifiy-between">
        <button id="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Submit
        </button>
    </div>
</form>
</div>
