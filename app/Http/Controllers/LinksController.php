<?php

namespace App\Http\Controllers;

use App\Models\Links;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tasks\CreateLinkTask;
use App\Http\Requests\CreateUrlRequest;
    
class LinksController extends Controller
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
    public function store(CreateUrlRequest $request)
    {
        $user = (Auth::id() == null) ? 0 : Auth::id();
        $create = new CreateLinkTask();
        $add_url = $create -> run($request->all(), $user);
        
//        dd( $request->cookie('name_url') );
//        dd( $_COOKIE['name_url'] );
        dd( $_COOKIE );
        
        if($add_url){
            return redirect() -> route('welcome') -> with(['success' => 'URL адрес записан']);
        }else{
            return back() -> withErrors(['msg' => 'Ошибка сохранения']) -> withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Links  $links
     * @return \Illuminate\Http\Response
     */
    public function show(Links $links)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Links  $links
     * @return \Illuminate\Http\Response
     */
    public function edit(Links $links)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Links  $links
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Links $links)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Links  $links
     * @return \Illuminate\Http\Response
     */
    public function destroy(Links $links)
    {
        //
    }
}
