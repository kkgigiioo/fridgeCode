@extends('layouts.app')
@section('title')
{{ __('My Products') }}
@endsection
@section('content')
<div class="container">

        @include('layouts._messageDanger')
        @include('layouts._messageWarning')

    <div class="row">
         @foreach($data as $item) 
            @if($item->expiration < date('Y-m-d',strtotime("+10 day")))
                <a href="/home/{{ $item->barcode }}">
                <div class="card border-danger mb-3" style="width: 18rem; margin: 2rem;">
                    <img class="card-img-top" src="{{ $item->picture_url }}" alt="{{ $item->name }} picture" style="height:15rem; object-fit:scale-down;">
                    <div class="card-title">
                        <h5  style="color:rgb(227, 36, 43);">{{ $item->name }}</h5>
                    </div>
                    <div class="card-body text-danger">
                        <p class="card-text" style="color:rgb(227, 36, 43);">{{ $item->expiration }}</p>
                        <p class="card-text" style="color:rgb(227, 36, 43);">{{ $item->number_of_item }} {{ $item->unitName }}</p>
                    </div>
                </div>
                </a>
            @elseif($item->number_of_item < 2 && strcmp($item->unitName, 'piece') !== 0)
                <a href="/home/{{ $item->barcode }}">
                <div class="card border-warning mb-3" style="width: 18rem; margin: 2rem;">
                    <img class="card-img-top" src="{{ $item->picture_url }}" alt="{{ $item->name }} picture" style="height:15rem; object-fit:scale-down;">
                    <div class="card-title">
                        <h5 style="color:rgb(242, 214, 0);">{{ $item->name }}</h5>
                    </div>
                    <div class="card-body text-warning">
                        <p class="card-text" style="color:rgb(242, 214, 0);">{{ $item->expiration }}</p>
                        <p class="card-text" style="color:rgb(242, 214, 0);">{{ $item->number_of_item }} {{ $item->unitName }}</p>
                    </div>
                </div>
                </a>
            @else
                <a href="/home/{{ $item->barcode }}">
                <div class="card border-dark mb-3" style="width: 18rem; margin: 2rem;">
                    <img class="card-img-top" src="{{ $item->picture_url }}" alt="{{ $item->name }} picture" style="height:15rem; object-fit:scale-down;">
                    <div class="card-title">
                        <h5 style="color:black;">{{ $item->name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $item->expiration }}</p>
                        <p class="card-text">{{ $item->number_of_item }} {{ $item->unitName }}</p>
                    </div>
                </div>
                </a>
            @endif
        @endforeach
    </div>
</div>
@endsection
