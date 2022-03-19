<?php

namespace App\Http\Controllers;

use App\Repositories\LinksRepository;
use Illuminate\Http\Request;
use App\Tasks\CreateNameTask;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Главная страница для ввода ссылок
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
    
    /**
    * Страница со списком ссылок
    */
    public function links(LinksRepository $links_repositpry)
    {
        // Получаем список всех доступных ссылок
        $link_list = $links_repositpry -> getLinks();
        //добавляем в массив имя ресурса
        $array = CreateNameTask::run($link_list);
        
        return view('links', compact('array'));
    }
}
