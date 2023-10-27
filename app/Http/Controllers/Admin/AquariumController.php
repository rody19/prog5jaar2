<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AquariumStoreRequest;
use App\Http\Requests\AquariumUpdateRequest;
use App\Models\Aquarium;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    if (auth()->user()->role == 1) {
        return view('admin.aquarium.create');
    }
    else {
        return view('home');
    }
}

public function store (AquariumStoreRequest $request){
    $aquarium = new Aquarium();
    $aquarium -> name = $request->name;
    $aquarium -> description = $request->description;
    $aquarium -> save();
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

    if (auth()->user()->role == 1) {
        return view('admin.aquarium.update', compact('aquarium'));
    }
    else {
        return view('home');
    }


}

//eerst word de id gezocht, daarna word de nam en description veranderd.
public function edit(AquariumUpdateRequest $request, $id){
    $aquarium = Aquarium::find($id);
//    $this->authorize('edit', $aquarium);
    $aquarium -> name = $request->name;
    $aquarium -> description = $request->description;
    $aquarium -> save();
    return redirect()->route('aquarium.index')->with('status', 'info update');
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
