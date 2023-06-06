<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Post;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to our web app';
        $projects = Project::where('starting_date', '>', now())->get();
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();

        //return view('pages.index', compact('title'));
        return view('pages.index',compact('projects','posts'))->with('title',$title);
    }
    public function about(){
        $title = 'About us';
        return view('pages.about')->with('title',$title);
    }
    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web desing', 'Programming' , 'SEO']
        );
        return view('pages.services')->with($data);
    }
    public function blog()
    {   
        $posts = Post::latest()->paginate(3);
        return view('pages.posts')->with('posts',$posts);
    }
}
