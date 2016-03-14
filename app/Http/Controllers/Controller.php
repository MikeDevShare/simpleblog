<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

//use App\Http\Controllers\BasicFunc as BF;
require_once( app_path() .'/Traits/BasicFunc.php');
class Controller extends BaseController
{
	
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
    	$data = array(
    		'id' => 1
    	);
   
    	return include_view('welcome',$data,'header','footer');
    }

 
    
}
