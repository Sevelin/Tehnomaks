@extends('layouts.app')

@section('content')
    <div>
       <div class="text-center">
           <h3> Сохранённые ссылки </h3>
       </div>
        @foreach($array as $link)
           <div>
            <p
                @click="counClickLink({{$link['id']}})"
            > 
                {{ $link['name'] }} 
            </p>
            </div>
        @endforeach
    </div>
@endsection
