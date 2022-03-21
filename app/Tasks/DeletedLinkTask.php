<?php

namespace App\Tasks;

use App\Models\HistoryClick;
use App\Models\Links;


class DeletedLinkTask
{
    
    /**
    * Удаляем ссылку из БД
    * Удаляем все данные о ссылке из истории
    */
    public static function run($id)
    {
        $result = Links::destroy($id);
        $result2 = HistoryClick::where('link_id', '=', $id) -> delete();
        
        if($result && $result2){
            return true;
        }else{
            return false;
        }
    }
    
}