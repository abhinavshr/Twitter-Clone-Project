<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $Idea){

        return view('ideas.show',compact('Idea'));
    }

    public function store()
{
    request()->validate([
        'idea' => 'required|min:5|max:240'
    ]);

    $idea = Idea::create(['content' => request()->get('idea', '')]);

    return redirect()->route('dashboard')->with('success', 'Idea Created Successfully!');
}

    public function destroy($id){

        $idea = Idea::where('id', $id)->firstOrFail()->delete();

        return redirect()->route('dashboard')->with('success','Idea Deleted Successfully');

    }

    public function edit(Idea $Idea){

        $editing = true;

        return view('ideas.show',compact('Idea', 'editing'));
    }

    public function update(Idea $Idea){

        request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $Idea->content = request()->get('content', '');
        $Idea->save();

        return redirect()->route('ideas.show', $Idea->id)->with('success', 'Idea Update Successfully!');
    }

}
