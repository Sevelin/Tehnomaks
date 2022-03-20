<?php

namespace App\Tasks;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Links;

class CreateLinkTask
{
    
    /**
    * В зависимости от полученных данных
    * Либо записываем в Куки
    * Либо записываем в БД
    */
    public static function run($array, $user)
    {
        if(isset($array['tmp'])){
            
            $str = '|' . $array['url'];
            
            if( isset($_COOKIE['name_url']) != false)
            {
                $str .= $_COOKIE['name_url'];
            }
            
            $response = new Response();
//            $add_url = $response -> withCookie( cookie('name_url', $array['url'], 5) );
//            $add_url = cookie('name_url', $array['url'], 5);
           
            return setcookie('name_url', $str, time() + 60);
        }else{
            $add_url = Links::create([
                'user_id'   =>  $user,
                'name_url'  =>  $array['url'],
                'static_day' => 14,
                'private'   => 0
            ]);
        }
        //dd( $request->cookie('name_url') );
        
        
        return $add_url;
    }
    
    
}