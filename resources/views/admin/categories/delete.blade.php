<form action="{{ route('categories.destroy', $categories->id) }}" method="POST">
    @method('DELETE')
    @csrf

    <!-- Rest of your form -->

<div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Name
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline" name="name" id="name" value="{{$categories->name}}" type="text" disabled>
    </div>

    <div class="flex items-center justify-between">
        <button id="submit" class="bg-green-500 hover:bg-green-700 text:white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Delete
        </button>
    </div>

</form>
