@extends('layouts.app')
@section('title')
{{ __('adott termék') }}
@endsection
@section('content')
<div class="container">
    <div class="row" style="width:100%;">
        @foreach($data as $item)
            <img class="card-img-top" src="{{ $item->picture_url }}" alt="{{ $item->name }} picture" style="max-height:20%; max-width:20%;">
            <div class="card" style="max-width:70%; min-width:50%;">
                <div class="card-body">
                    <h3 class="card-title">{{ $item->name }}</h3>
                    <p class="card-text"><strong>Expiration:</strong> {{ $item->expiration }}</p>
                    <p class="card-text">{{ $item->number_of_item }} {{ $item->unitName }}</p>
                    <p class="card-text"><strong>Brand:</strong> {{ $item->brandName }}</p>
                    <p class="card-text"><strong>Location:</strong> {{ $item->locationName }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection