<?php

namespace App\Tasks;
    
class CreateLinkTask
{
    
    /**
    * В зависимости от полученных данных
    * Либо записываем в Куки
    * Либо записываем в БД
    */
    public static function run($array, $user)
    {
        dd($array);
        $add_url = Links::create([
            'user_id'   =>  $user,
            'name_url'  =>  $request -> url,
            'static_day' => 14,
            'private'   => 0
        ]);
        
        return $array;
    }
    
    
}