@extends('layouts.app')

@section('content')
    <div>
       <div class="text-center">
           <h3 class="text-warning"> Сохранённые ссылки </h3>
       </div>
        @foreach($array as $link)
           <div class="d-flex flex-column text-center">
            <a href="{{$link['name_url']}}" 
                title="{{$link['name_url']}}"
                target="_blank"
                class="p-2 mb-2 bg-success text-white text-decoration-none"
                @click="counClickLink({{$link['id']}})"
            > 
                {{ $link['name'] }} 
            </a>
            </div>
        @endforeach
    </div>
@endsection
