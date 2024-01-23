<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function like(Idea $idea){
        $user = auth()->user();
        $user->likes()->attach($idea);
        return redirect()->back()->with("success","liked successfully");

    }
    public function unlike(Idea $idea){
        $user = auth()->user();
        $user->likes()->detach($idea);
        return redirect()->back()->with("success","unliked successfully");
    }
}
