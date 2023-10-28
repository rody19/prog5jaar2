<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesStoreRequest;
use App\Http\Requests\CategoriesUpdateRequest;
class CategoriesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {

        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
}

    public function create()
    {

        return view('admin.categories.create');

    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'categories' => 'array', // Assuming you are expecting an array of category IDs
        ]);

        $category = new Category();
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];
        $category->save();

        // Attach categories to the newly created category, if 'categories' were provided in the request
        if (isset($validatedData['categories'])) {
            $category->categories()->attach($validatedData['categories']);
        }

        return redirect()->route('admin.categories.index')->with('status', 'Category created');
    }


    public function show($id)
    {
        $categories = Category::find($id);


            return view('admin.categories.show', compact('categories'));

    }

    public function edit(Category $categories, $id)
    {
        $categories = Category::find($id);


            return view('admin.categories.edit', compact('categories'));

    }

    public function update(CategoriesUpdateRequest $request, $id)
    {
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('categories.index')->with('status', 'Category Updated');
    }

    public function delete(Category $categories)
    {


            return view('admin.categories.delete', compact('categories'));
    }
    public function destroy(Category $categories, $id)
{
    $categories = Category::find($id);
    $categories->delete();
    return redirect()->route('admin.categories.index')->with('status', 'Category deleted');
}
}
