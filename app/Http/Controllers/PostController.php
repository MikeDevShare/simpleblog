<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\User;
use App\Http\Requests;
use App\Http\Requests\PostFormRequest;
class PostController extends Controller
{
    public function index(){
    	$data = array(
    		'id' => 1
    	);
   		$posts = posts::where('status','publish')->orderBy('created_at','desc')->paginate(5);
   		$title = 'Latest Posts';
    	return view('welcome')->withPosts($posts)->withTitle($title);
    }
	public function create(Request $request)
	{
		// if user can post i.e. user is admin or author
		if($request->user()->can_post())
		{
		  return view('posts.create');
		}    
		else 
		{
		  return redirect('/')->withErrors('You have not sufficient permissions for writing post');
		}
	}
	public function show($slug)
	{
		$post = Posts::where('slug',$slug)->first();
		if(!$post)
		{
		   return redirect('/')->withErrors('requested page not found');
		}
		$comments = $post->comments;
		return view('posts.show')->withPost($post)->withComments($comments);
	}


}
