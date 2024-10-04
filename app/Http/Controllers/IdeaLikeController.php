<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $Idea){

        $liker = auth()->user();

        $liker-> likes()->attach($Idea);

        return redirect()->route('dashboard', $Idea->id)->with('success', "Liked Successfully");
    }

    public function unlike(Idea $Idea){

        $liker = auth()->user();

        $liker-> likes()->detach($Idea);

        return redirect()->route('dashboard', $Idea->id)->with('success', "UnLiked Successfully");

    }
}
