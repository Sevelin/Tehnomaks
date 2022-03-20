<?php

namespace App\Tasks;
    
class CreateNameTask
{
    
    /**
    * Создаём имя для ссылок
    * Добавляем имя в массив
    */
    public static function run($array)
    {
        
         foreach($array as $key => $item)
        {
            $array[$key]['name'] = self::cutUrl($item['name_url']);
        }
        
        return $array;
    }
    
    /**
    * Обрезаем URL адрес
    */ 
    private static function cutUrl($url)
    {
        $name = mb_strtolower($url);
        
        if (substr($url, 0, 12) == 'https://www.') $name = substr($url, 12);
        elseif (substr($url, 0, 11) == 'http://www.') $name = substr($url, 11);
        elseif (substr($url, 0, 8) == 'https://') $name = substr($url, 8);
        elseif (substr($url, 0, 7) == 'http://') $name = substr($url, 7);
        $arr = explode('/', $name);
        $element = ucfirst($arr[0]);
        
        return $element;
    }
    
}