<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
	
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
    	$data = array(
    		'id' => 1
    	);
   		$posts = Posts::where('status','publish')->orderBy('created_at','desc')->paginate(5);
   		$title = 'Latest Posts';
    	return view('welcome')->withPosts($posts)->withTitle($title);
    }

 
    
}
