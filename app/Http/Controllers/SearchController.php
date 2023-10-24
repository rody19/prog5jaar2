<?php

use App\Models\User; // Import your model

public function index(Request $request)
{
    $query = $request->input('query'); // Get the search query from the form

    $results = YourModel::where('column_name', 'LIKE', '%' . $query . '%')->get();

    return view('search-results', compact('results'));
}
