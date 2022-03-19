@extends('layouts.app')

@section('content')
    <div>
        @foreach($array as $link)
           <div>
            <a href="{{$link['name_url']}}" 
                title="{{$link['name_url']}}"
                @click="counClickLink({{$link['id']}})"
            > 
                {{ $link['name'] }} 
            </a>
            </div>
        @endforeach
    </div>
@endsection
