<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){
        request()->validate(
            [
                'idea'=> 'required|min:5|max:100'
            ]
        );
        $idea = Idea::create([
            "content"=> request()->get('idea',''),
            "likes"=>0,
            "user_id" => auth()->id()
        ]);
        return redirect()->route('dashboard')->with('success','Idea created Successfully');
    }
    public function destroy(Idea $idea){
        // if(auth()->id() != $idea->user_id){
        //     abort(404);
        // }
        $this->authorize('delete', $idea);
        $idea->delete();
        return redirect()->route('dashboard')->with('success','Idea deleted Successfully');
    }
    public function show(Idea $idea){
        return view('ideas.show', ['idea'=> $idea]);
    }

    public function edit(Idea $idea){
        $this->authorize('update', $idea);
        // if(auth()->id() != $idea->user_id){
        //     abort(404);
        // }
        return view('ideas.edit', ['idea'=> $idea]);
    }
    public function update(Idea $idea){
        // if(auth()->id() != $idea->user_id){
        //     abort(404);
        // }
        $this->authorize('update', $idea);

        request()->validate(
            [
                'idea'=> 'required|min:5|max:100'
            ]
        );
        $idea->update(["content"=> request()->get('idea','')]);
        return view('ideas.show', ['idea'=> $idea]);
    }
}
