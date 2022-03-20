@extends('layouts.app')

@section('content')
    <div>
       <div class="text-center">
           <h3> Сохранённые ссылки </h3>
       </div>
        @foreach($array as $link)
           <div>
            <a href="{{$link['name_url']}}" 
                title="{{$link['name_url']}}"
                target="_blank"
                @click="counClickLink({{$link['id']}})"
            > 
                {{ $link['name'] }} 
            </a>
            </div>
        @endforeach
    </div>
@endsection
