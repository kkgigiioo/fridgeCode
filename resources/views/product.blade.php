@extends('layouts.app')
@section('title')
    @foreach($data as $item)
        {{ $item->brandName }} | {{ $item->name }}
    @endforeach
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-md-center" style="width:100%;">
        @foreach($data as $item)
            <img class="card-img-top" src="{{ $item->picture_url }}" alt="{{ $item->name }} picture" style="max-height:30%; max-width:30%;">
            <div class="card" style="max-width:70%; min-width:50%;">
                <div class="card-body">
                    <h1 class="card-title">{{ $item->name }}</h1>
                    <p class="card-text"><h4><strong>Expiration:</strong> {{ $item->expiration }}</h4></p>
                    <p class="card-text"><h4>{{ $item->number_of_item }} {{ $item->unitName }}</h4></p>
                    <p class="card-text"><h4><strong>Brand:</strong> {{ $item->brandName }}</h4></p>
                    <p class="card-text"><h4><strong>Location:</strong> {{ $item->locationName }}</h4></p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection