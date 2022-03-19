<?php

namespace App\Repositories;

use Illumanate\DataBase\Eloquement\Model;

abstract class CoreRepository{
    
    protected $Model;
    
    /**
    * Ожидаем передачу Модели для созданния Объекта
    */
    public function __construct()
    {   
        $this -> Model = app($this -> getModelClass());
    }
    
    /**
    * Любой, кто унаследует этот класс
    * должен содержать текущий метод 
    * для того чтобы передать Модель
    */
    abstract protected function getModelClass();
    
    /**
    * Создаём клон объекта, чтобы репозиторий не хранил в себе информацию
    */
    protected function query()
    {
        return clone $this -> Model;
    }
}