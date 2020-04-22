<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tweet;

class TweetController extends Controller
{
   
    public function index()
    {
        $tweets = auth()->user()->timeline();
        return view('tweets.index', ['tweets'=>$tweets]);
    }
    
    public function store()
    {
        $validatedAttributes = request()->validate([
            'body' => 'required|max:255'
        ]);
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $validatedAttributes['body']
        ]);
        return redirect(route('tweets.index'));
    }
    
}
