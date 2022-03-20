@extends('layouts.app')

@section('content')
    <div>
        <chart-component :id="{{ json_encode($user_id) }}"></chart-component>
    </div>
@endsection
