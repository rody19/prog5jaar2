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

    return view('admin.aquarium.index', compact('aquarium'));
}

public function create(){

    return view('admin.aquarium.create');

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
    return view('admin.aquarium.show', compact('aquarium'));
}

//die zoekt de id(aquarium)
public function update ($id){
    $aquarium = Aquarium::find($id);
    return view('admin.aquarium.update', compact('aquarium'));
}

//eerst word de id gezocht, daarna word de nam en description veranderd.
public function edit(AquariumUpdateRequest $request, $id){
    $aquarium = Aquarium::find($id);
    $aquarium -> name = $request->name;
    $aquarium -> description = $request->description;
    $aquarium -> save();
    return redirect()->route('aquarium.index')->with('status', 'info update');
}

public function delete (Aquarium $aquarium){
    return view('admin.aquarium.delete', compact('aquarium'));
}

    public function destroy(Aquarium $aquarium) {
        $aquarium->delete();
        return redirect()->route('aquarium.index')->with('status', 'Info deleted');
    }


}
