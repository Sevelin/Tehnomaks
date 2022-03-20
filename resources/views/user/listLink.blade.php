@extends('layouts.app')

@section('content')
    <div>
        <link-component :id="{{ json_encode($user_id) }}"></link-component>
    </div>
@endsection
