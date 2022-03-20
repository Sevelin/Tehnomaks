<?php

namespace App\Tasks;
    
class LinkTemporaryTask
{
    /**
    * Проверяем есть ли сохраненные куки.
    * Если куки есть, то преобразуем в массив
    */
    public static function run()
    {
        if( isset($_COOKIE['name_url']) != false ){
            $array = explode('|', $_COOKIE['name_url']);
            //Удаляем массив с индексом 0, так как он пустой
            array_shift($array);
            
            return $array;
        }
        return [];
    }
}