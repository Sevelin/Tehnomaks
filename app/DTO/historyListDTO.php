<?php

namespace App\DTO;

class historyListDTO{
    
    /**
    * Получаем массив количества кликов по ссылкам
    * Преобразовываем их в нужные нам
    */
    public static function run($array)
    {
//        return $array;
        $newArray = [];
        // уникальные ид ссылок
        $idArray = self::uniqueId($array);
        
        foreach($array as $item):
            $link_id = $item['link_for_history']['id'];
            
            if(isset($newArray[$link_id]) ){
                $newArray[$link_id]['count'] += 1;
            }else{
                $newArray[$link_id]['count'] = 1;
                $newArray[$link_id]['user_id'] = $item['user_for_history']['id'];
                $newArray[$link_id]['user_name'] = $item['user_for_history']['name'];
                $newArray[$link_id]['url_id'] = $item['link_for_history']['id'];
                $newArray[$link_id]['name_url'] = $item['link_for_history']['name_url'];
            }
        endforeach;
        
        return $newArray;
    }
                         
    /**
    * Получаем уникальные id
    */
    private static function uniqueId($array)
    {
        $newArray = [];
        foreach($array as $item):
            $newArray []= $item['link_for_history']['id'];
        endforeach;
        
        return array_unique($newArray);
    }
}