<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $idea = Idea::orderBy("created_at","desc");
        if(request()->has("searchWord")){
        $idea = Idea::where("content",  "like","%".request()->get("searchWord")."%");
        }
        return view("welcome",[
            "ideas"=> $idea->paginate(3),
        ]);
    }
}
