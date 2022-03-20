<?php

namespace App\Tasks;
    
class getStrTask
{
    
    /**
    * Из массива выбираем данные которые нужны и записываем их в строку
    * 1-ый параметр массив
    * 2-й параметр имя колонки
    */
    public static function run($array, $name)
    {
        $newArray = [];
        
        foreach($array as $item):
            $newArray []= $item[$name];
        endforeach;
        
        return $newArray;
        
    }
    
    
}