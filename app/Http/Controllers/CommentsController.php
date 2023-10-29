<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aquarium;
use App\Models\Comment;
use App\Models\AquariumBezoek;

class CommentsController extends Controller
{
    public function show($id)
{
    $aquarium = Aquarium::find($id);
    $comments = $aquarium->comments;

    if (auth()->user()->role == 0) {
        $user = auth()->user();

        // Check if the user has visited this aquarium
        $aquariumBezoek = AquariumBezoek::where('user_id', $user->id)
            ->where('aquarium_id', $aquarium->id)
            ->first();

        if (!$aquariumBezoek) {
            // User hasn't visited the aquarium; create a visit record
            $aquariumBezoek = new AquariumBezoek();
            $aquariumBezoek->user_id = $user->id;
            $aquariumBezoek->aquarium_id = $aquarium->id;
            $aquariumBezoek->bezoekingen = 1;
            $aquariumBezoek->save();
        } else {
            // Increment the visit count
            $aquariumBezoek->increment('bezoekingen');
        }

        // Check if the user has visited at least 2 aquariums
        $bezochtenAquariumCount = AquariumBezoek::where('user_id', $user->id)
            ->distinct('aquarium_id')
            ->count();

        if ($bezochtenAquariumCount < 3) {
            return redirect()->route('home')
                ->with('status', 'Als je een comment wil plaatsen moet je minimaal 2 aquariums bezoeken');
        }
    }

    return view('comments.show', compact('aquarium', 'comments'));
}

    

    public function store(Request $request, $id)
{
    $aquarium = Aquarium::find($id);

    // Create a new comment and associate it with the aquarium and user
    $comment = new Comment();
    $comment->content = $request->input('content');
    $comment->user_id = auth()->id(); 
    $comment->aquarium_id = $aquarium->id;
    $aquarium->comments()->save($comment);

    return redirect()->route('comments.show', ['aquarium' => $aquarium->id])->with('status', 'Comment toegevoegd');
}
}

