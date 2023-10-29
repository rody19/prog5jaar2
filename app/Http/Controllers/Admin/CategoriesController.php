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
        if (auth()->user()->role == 1) {
            return view('admin.categories.index', compact('categories'));
        } else {
            return redirect()->route('home');
        }
}

    public function create()
    {

  if (auth()->user()->role == 1) {
            return view('admin.categories.create');
        } else {
            return redirect()->route('home');
        }

    }


    public function store(Request $request)
    {
        $categories = new Category();
        $categories -> name = $request->name;
        $categories -> save();
        return redirect()->route('admin.categories.index')->with('status', 'Category created');
    
    }


    public function show($id)
    {
        $categories = Category::find($id);

        if (auth()->user()->role == 1) {
            return view('admin.categories.show', compact('categories'));
        } else {
            return redirect()->route('home');
        }

    }

    public function edit(Category $categories, $id)
    {
        $categories = Category::find($id);

        if (auth()->user()->role == 1) {
            return view('admin.categories.edit', compact('categories'));
        } else {
            return redirect()->route('home');
        }

    }

    public function update(CategoriesUpdateRequest $request, $id)
    {
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('admin.categories.index')->with('status', 'Category Updated');
    }

    public function delete(Category $categories)
    {

        if (auth()->user()->role == 1) {
            return view('admin.categories.delete', compact('categories'));
        } else {
            return redirect()->route('home');
        }
    }
    public function destroy(Category $categories, $id)
{
    $categories = Category::find($id);
    $categories->delete();
    return redirect()->route('admin.categories.index')->with('status', 'Category deleted');
}
}
