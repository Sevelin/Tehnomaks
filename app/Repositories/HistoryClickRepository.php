<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;

use App\Models\HistoryClick as Model;
    
class HistoryClickRepository extends CoreRepository
{
    /**
    * Передаем созданный объект в базовый репозиторий, чтобы могли работать с клоном объекта
    */
    protected function getModelClass()
    {
        return Model::class;
    }
    
    
    /**
    * Получаем данные для просмотра кликов из истории пользователя
    */
    public function getGistoryList($id)
    {
        $columns = [
            'id',
            'user_id',
            'link_id'
        ];
        
        $time = date('Y-m-d', strtotime("now - 14 day"));
        
        $quest = $this -> query()
                    -> select($columns)
                    -> where('user_id', $id)
                    -> where('created_at', '>=', $time)
                    -> with(['userForHistory:id,name', 
                             'linkForHistory:id,name_url'
                            ])
                    -> get();
        
        return $quest -> toArray();
    }
    
}