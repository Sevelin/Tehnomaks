<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;

use App\Models\Links as Model;

class LinksRepository extends CoreRepository
{
    
    /**
    * Передаем созданный объект в базовый репозиторий, чтобы могли работать с клоном объекта
    */
    protected function getModelClass()
    {
        return Model::class;
    }
    
    /**
    * Получаем список ссылок
    */
    public function getLinks()
    {
        
        $columns = [
            'name_url',
            'id'
        ];
        
        $query = $this -> query()
                    -> select($columns)
                    -> where(['private' => '0'])
                    -> get();
        
        return $query -> toArray();
    }
    
    /**
    * Получаем список ссылок которые создавал пользователь
    */
    public function getUserLinks($id)
    {
        $columns = [
            'name_url',
            'id',
            'count_click',
            'private'
        ];
        
        $quest = $this -> query()
                    -> select($columns)
                    -> where(['user_id' => $id])
                    -> get();
        
        return $quest -> toArray();
    }
    
    
}