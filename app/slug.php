<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slug extends Model
{
    
    static function getContent($slugName)
    {
    	$slug = self::where('slugName',$slugName)->first();
    	if($slug->count()){
    		return $slug->content;
    	}else{
    		return '404';
    	}
    }
}
