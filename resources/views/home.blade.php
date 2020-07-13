@extends('layouts.app')
@section('title')
{{ __('My Products') }}
@endsection
@section('content')
<div class="container">
    <div class="row">
        @foreach($data as $item)
            <a href="/home/{{ $item->barcode }}">
            <div class="card border-dark mb-3" style="width: 18rem; margin: 2rem;">
                <img class="card-img-top" src="{{ $item->picture_url }}" alt="{{ $item->name }} picture" style="max-height:20rem">
                <div class="card-title">
                    <h5>{{ $item->name }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $item->expiration }}</p>
                    <p class="card-text">{{ $item->number_of_item }} {{ $item->unitName }}</p>
                </div>
            </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
