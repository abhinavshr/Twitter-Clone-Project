<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $Idea)
    {

        return view('ideas.show', compact('Idea'));
    }

    public function store()
    {
        $validate = request()->validate([
            'idea' => 'required|min:5|max:240'
        ]);

        $validate['content'] = $validate['idea'];
        unset($validate['idea']);

        $validate['user_id'] = auth()->id();

        Idea::create($validate);

        return redirect()->route('dashboard')->with('success', 'Idea Created Successfully!');
    }

    public function destroy($id)
{
    $idea = Idea::where('id', $id)->firstOrFail();

    if(auth()->id() !== $idea->user_id){
        abort(404);
    }

    $idea->delete();

    return redirect()->route('dashboard')->with('success', 'Idea Deleted Successfully');
}

    public function edit(Idea $Idea)
    {

        if(auth()->id() !== $Idea->user_id){
            abort(404);
        }

        $editing = true;

        return view('ideas.show', compact('Idea', 'editing'));
    }

    public function update(Idea $Idea)
{
    if(auth()->id() !== $Idea->user_id){
        abort(404);
    }

    request()->validate([
        'content' => 'required|min:5|max:240'
    ]);

    $Idea->content = request()->get('content', '');
    $Idea->save();

    return redirect()->route('ideas.show', $Idea->id)->with('success', 'Idea Update Successfully!');
}
}
