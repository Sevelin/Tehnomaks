<?php

namespace App\Tasks;
use App\Models\Links;
use App\Models\HistoryClick;
use App\Observers\LinksObserver;
    
class CountClickLink
{
    
    /**
    * Добавляем в базу данных клики по добавленным ссылкам
    * Сначало обнавляем всего сколько кликов было совершено
    * Потом добавляем отдельную запись с каждым кликом
    */
    public static function run($array, $id_link)
    {
        
        if(isset($array['count_click']) ){
            //находим запись по id ссылки
            $link = Links::find($id_link);
            
            // получаем текущее значение и прибавляем 1;
            $new_count = $link -> getOriginal('count_click') + 1;
            
            // Сохраняем полученое совокупное число кликов
            $link -> count_click = $new_count;
            
            // записываем
            $link -> save();
            
            //Создаём новую запись в HistoryClick
            HistoryClick::create([
                'user_id'   =>  $link -> getOriginal('user_id'),
                'link_id'   =>  $link -> getOriginal('id'),
            ]);
        }
        
    }
    
    
}