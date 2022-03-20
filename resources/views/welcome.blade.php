@extends('layouts.app')

@section('content')
    
    <div class="message">
        @if($errors -> any())
            <div class="error">
                {{ $errors -> first() }}
            </div>
        @endif

        @if(session('success'))
            <div class="success">
                {{ session() -> get('success') }}
            </div>
        @endif
    </div>
    
    
    <form action="{{ route('link.store') }}" method="post">
        @csrf
       <div>
           <p> Запиши сюда любую ссылку </p>
       </div>
        <div>
            <label for="url"></label>
            <input type="text" 
                    id="url" 
                    name="url" 
                    placeholder="Введите ссылку" 
                    v-model="urlRaw">
        </div>
        <div>
            <label for="tmp_link"> 5 минутная ссылка </label>
            <input type="checkbox" name="tmp" id="tmp_link">
        </div>
        <div>
            <button type="submit" name="save_url"> Сохранить </button>
            <button type="button" v-on:click="slimUrl(urlRaw)"> Уменьшить </button>
        </div>
    </form>
@endsection

<!-- портируем стили и скрипты для текущей страницы -->
@once
   
    @push('styles')
        
    @endpush
   
@endonce