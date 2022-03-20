<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\HistoryClickRepository;
use App\DTO\historyListDTO;
use App\Tasks\CreateNameTask;
use App\Tasks\getStrTask;

class ApiHistoryClickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = new HistoryClickRepository();
        // Получаем данные для пользователя из истории
        $list = $query -> getGistoryList($id);
        
        //Запоминаем Имя Пользователя
        $userName = $list[0]['user_for_history']['name'];
        
        // Приводем к нужному массиву
        $historyList = historyListDTO::run($list);
        
        //Добавляем Имя ссылки
        $result = CreateNameTask::run($historyList);
        
        //Получаем данные для вывода на график
        $labels = getStrTask::run($result, 'name');
        $data = getStrTask::run($result, 'count');
        
        return [
            'labels' => $labels,
            'datasets' => array([
                'label'             => 'Переходы по ссылка ' . $userName,
                'backgroundColor'   => '#F26202',
                'data'              => $data,
            ])
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
