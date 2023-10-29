
{{--mensen die op de pagina komen en alles ingevuld hebben worden daarna naar de aquarium edit page gestuurd--}}
<form id="form" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
      action="{{ route('categories.update', $categories->id ) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Name
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tigh focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" name="name" id="name" value="{{$categories->name}}" type="text">
    </div>
    <div class="flex items-center justify-between">
        <button id="submit" class="bg-green-500 hover:bg-green-700 text:white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Edit
        </button>
    </div>
    </div>
</form>

