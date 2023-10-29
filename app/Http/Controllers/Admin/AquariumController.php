<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AquariumStoreRequest;
use App\Http\Requests\AquariumUpdateRequest;
use App\Models\Aquarium;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AquariumController extends Controller
{
public function __construct(){
    $this->middleware('auth');
}
public function index()
{
    $aquarium = Aquarium::all();

    if (auth()->user()->role == 1) {
        return view('admin.aquarium.index', compact('aquarium'));
    }
    else {
        return view('home', compact('aquarium'));
    }
}

public function create(){
    $aquarium = Aquarium::all();
    $categories = Category::all();

    if (auth()->user()->role == 1) {
        return view('admin.aquarium.create', compact('categories'));
    }
    else {
        return view('home');
    }
}

public function store (AquariumStoreRequest $request){
    $aquarium = new Aquarium();
    $aquarium -> name = $request->name;
    $aquarium -> description = $request->description;
    $aquarium->user_id = auth()->id();
    $aquarium -> save();

    $aquarium->categories()->attach($request->input('categories'));

    return redirect()->route('aquarium.index')->with('status', 'info created');
}

public function show ($id) {

    $aquarium = Aquarium::find($id);

    if (auth()->user()->role == 1) {
        return view('admin.aquarium.show', compact('aquarium'));
    }
    else {
        return view('home');
    }
}

//die zoekt de id(aquarium)
public function update ($id){
    $aquarium = Aquarium::find($id);
    $categories = Category::all();
    $user = auth()->user();


    // Check if the currently logged in user is the creator of the game
    if ($user->id === $aquarium->user_id) {
        return view('admin.aquarium.update', compact('aquarium', 'categories'));
    } else {
        return redirect()->route('home');
    }


}

//eerst word de id gezocht, daarna word de nam en description veranderd.
public function edit(AquariumUpdateRequest $request, $id){
    $aquarium = Aquarium::find($id);
    $categories = Category::all(); // Fetch all tags
    $aquarium -> name = $request->name;
    $aquarium -> description = $request->description;
    $aquarium -> save();
    $aquarium->categories()->sync($request->input('categories'));
    return redirect()->route('aquarium.index')->with('status', 'info update');
}

public function aanzet($id){
    $aquariums = Aquarium::find($id);
    $aquariums->aquarium_status = true; // Change the status to "true"
    $aquariums->save();

    return redirect()->route('aquarium.index')->with('status', 'aquarium accepted');
}

    public function uitzet($id){
        $aquariums = Aquarium::find($id);
        $aquariums->aquarium_status = false; // Change the status to "false"
        $aquariums->save();

        return redirect()->route('aquarium.index')->with('status', 'aquarium denied');
    }

public function delete (Aquarium $aquarium){

    if (auth()->user()->role == 1) {
        return view('admin.aquarium.delete', compact('aquarium'));
    }
    else {
        return view('home');
    }
}

    public function destroy(Aquarium $aquarium) {
        $aquarium->delete();
        return redirect()->route('aquarium.index')->with('status', 'Info deleted');
    }
}
