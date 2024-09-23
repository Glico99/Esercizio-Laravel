<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function share(Idea $id){
        $validated = request()->validate([
            'comment' => 'required|min:1|max:250',
            'idea_id' => $id->id,
            'user_id' => auth()->user()->id
        ]);

        $comments = Comment::create([
            'content' => $validated['comment'],
            'idea_id' => $validated['idea_id'],
            'user_id' => $validated['user_id'],
        ]);

        $comments->save();

        return redirect()->route('showDashboard')->with('success', 'Comment Posted!');
    }
}
