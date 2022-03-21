@extends('layouts.app')

@section('content')
    
    <div class="message">
        @if($errors -> any())
            <div class="alert alert-danger" role="alert">
                {{ $errors -> first() }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session() -> get('success') }}
            </div>
        @endif
    </div>
    
    <div class="">
        <form action="{{ route('link.store') }}" 
               method="post"
               class=" m-auto text-center card pt-4 pb-4 w-50"
        >
            @csrf
           <div>
               <h3 class="text-warning"> Запиши сюда любую ссылку </h3>
           </div>
            <div class="w-75 m-auto">
                <label for="url"></label>
                <input type="text" 
                        id="url" 
                        name="url" 
                        class="form-control"
                        placeholder="Введите ссылку" 
                        v-model="urlRaw"
                >
            </div>
            <div class="mt-4 mb-4">
                <label for="tmp_link" 
                        class="form-check-label"
                > 
                    Создать временную ссылку (1 мин)
                </label>
                <input type="checkbox" 
                        name="tmp" 
                        id="tmp_link"
                        class="form-check-input"
                >
            </div>
            <div>
                <button type="submit" 
                        name="save_url"
                        class="btn btn-success"
                > 
                    Сохранить 
                </button>
                <button type="button" 
                        v-on:click="slimUrl(urlRaw)"
                        class="btn btn-warning"
                > 
                    Уменьшить 
                </button>
            </div>
        </form>
    </div>
    
    <div v-if="smollLink.length > 0" class="d-flex justify-content-center m-5"> 
        
        <span v-html="smollLink"
              class="shadow-lg p-3 mb-5 bg-white rounded text-center"
        >
        </span> 
    </div>
    
    @if( !empty($tmpLink) )
        <div class=" mt-5">
            <div class="text-center">
                <h3 class="text-info"> Временные ссылки пользователя </h3>
            </div>
            <div class="d-flex flex-column text-center">
                @foreach($tmpLink as $link)
                    <a href="{{$link}}"
                       class="text-decoration-none bg-info text-white p-2 mb-2"> 
                        {{ $link }} 
                    </a>
                @endforeach
            </div>
        </div>
    @endif
@endsection

<!-- портируем стили и скрипты для текущей страницы -->
@once
   
    @push('styles')
        
    @endpush
   
@endonce