<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryClick extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'link_id'
    ];
    
    /**
    * Создаём отношение к пользователю
    */
    public function userForHistory()
    {
        return $this -> belongsTo(User::class, 'user_id', 'id');
    }
    
    /**
    * Создаём отношение к ссылке
    */
    public function linkForHistory()
    {
        return $this -> belongsTo(Links::class, 'link_id', 'id');
    }
}
