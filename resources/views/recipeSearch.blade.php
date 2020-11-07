@extends('layouts.app')
@section('title')
{{ __('My Products') }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @for($i = 0; $i < count($dataForRecipe); $i++)
            <a href="/recipe/{{ $id[$i] }}">
                <div class="card mb-3" style="width: 18rem; margin: 2rem;">
                    <img class="card-img-top" src="{{ $dataForRecipe[$i]['thumbnail_url'] }}" alt="{{ $dataForRecipe[$i]['name'] }} picture" style="height:15rem; object-fit:scale-down;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $dataForRecipe[$i]['name'] }}</h5>
                        <p class="card-text">{{ $dataForRecipe[$i]['description'] }}</p>
                    </div>
                </div>
            </a>
            @endfor
        </div>
    </div>
@endsection