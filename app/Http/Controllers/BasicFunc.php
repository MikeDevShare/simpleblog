<?php 
namespace App\Traits;

trait BasicFunc{
	function include_view($view_body, $data , $header = null, $footer = null ){
    	$html = '';
    	var_dump($view_body);die();
    	if( $header )
    		$html .= view($header,$data);
    	$html .= view($view_body,$data);
    	if( $footer )
    		$html .= view($footer);
    	return $html;
    }
}
