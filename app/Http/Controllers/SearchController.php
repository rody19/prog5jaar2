<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aquarium;
use App\Models\Category;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $selectedCategory = $request->input('category'); // Get the selected tag

        // Start with a base query
        $searchQuery = Aquarium::where('aquarium_status', true);

        if (!empty($query)) {
            // Add name and description search conditions
            $searchQuery->where(function ($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%");
            });
        }

        if (!empty($selectedCategory)) {
            // Filter by the selected tag
            $searchQuery->whereHas('categories', function ($q) use ($selectedCategory) {
                $q->where('categories.id', $selectedCategory); // Specify the table name to disambiguate
            });
        }


        // Get the search results
        $searchResults = $searchQuery->get();

        // Get all tags to populate the dropdown in the view
        $categories = Category::all();

        return view('search.index', compact('searchResults', 'categories'));
    }

}
