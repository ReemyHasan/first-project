<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $idea = Idea::orderBy("created_at","desc");
        if(request()->has("searchWord")){
        $idea = $idea->search(request("searchWord",""));
        }
        // $topUsers = User::withCount("ideas")->orderBy("ideas_count","desc")->limit(2)->get();
        return view("welcome",[
            "ideas"=> $idea->paginate(3),
            // "topUsers" =>$topUsers
        ]);
    }
}
