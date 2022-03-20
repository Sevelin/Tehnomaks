<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Показываем список ссылок пользователя
     *
     * @return \Illuminate\Http\Response
     */
    public function links()
    {
        $user_id = Auth::id();
        return view('user.listLink', compact('user_id'));
    }

    /**
     * Страница графика перехода по ссылкам
     *
     * @return \Illuminate\Http\Response
     */
    public function chart()
    {
        $user_id = Auth::id();
        return view('user.chart', compact('user_id')); 
    }

}
