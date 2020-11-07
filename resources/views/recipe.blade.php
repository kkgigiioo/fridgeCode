@extends('layouts.app')
@section('title')
{{ __('Recipes') }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @for($i = 0; $i < count($recipe['results']); $i++)
            <a href="/recipe/{{ $i }}">
                <div class="card mb-3" style="width: 18rem; margin: 2rem;">
                    <img class="card-img-top" src="{{ $recipe['results'][$i]['thumbnail_url'] }}" alt="{{ $recipe['results'][$i]['name'] }} picture" style="height:15rem; object-fit:scale-down;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $recipe['results'][$i]['name'] }}</h5>
                        <p class="card-text">{{ $recipe['results'][$i]['description'] }}</p>
                    </div>
                </div>
            </a>
            @endfor
        </div>
    </div>
@endsection

            