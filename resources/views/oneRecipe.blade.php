@extends('layouts.app')
@section('title')
    {{ $test['name'] }}
@endsection
@section('content')
    <div class="container">
        @if( isset($test['sections']) )
            <div class="row">
                <img src="{{ $test['thumbnail_url'] }}" alt="{{ $test['name'] }}" class="col-md-5" style="object-fit:scale-down;">
                <div class="col-md-6">
                    <h2>{{ $test['name'] }}</h2>
                        <h5>
                            @for($i=0; $i < count($test['sections']); $i++)
                                @for($j=0; $j < count($test['sections'][$i]['components']); $j++)
                                    <span class="badge badge-pill badge-info">{{ $test['sections'][$i]['components'][$j]['raw_text'] }}</span>
                                @endfor
                            @endfor
                        </h5>
                </div>
            </div>
            
            @for($i=0; $i < count($test['instructions']); $i++)
                @if($i == count($test['instructions'])-1)
                    <div class="row">
                        <div class="badge badge-success" style="margin:0.2rem auto; font-size: large;">
                            <h3 style="margin:0;">{{ $test['instructions'][$i]['display_text'] }}</h3>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-8 text-justify" style="margin:0.2rem auto; font-size: large;">
                            {{ $test['instructions'][$i]['display_text'] }}
                        </div>
                    </div>
                @endif
            @endfor
        @else
            <div class="row">
                <img src="{{ $test['thumbnail_url'] }}" alt="{{ $test['name'] }}" class="col-md-5" style="object-fit:scale-down;">
                <div class="col-md-6">
                    <h2>{{ $test['name'] }}</h2>
                        <h5>
                            @for($i=0; $i < count($test['recipes'][0]['sections']); $i++)
                                @for($j=0; $j < count($test['recipes'][0]['sections'][$i]['components']); $j++)
                                    <span class="badge badge-pill badge-info">{{ $test['recipes'][0]['sections'][$i]['components'][$j]['raw_text'] }}</span>
                                @endfor
                            @endfor
                        </h5>
                </div>
            </div>
            
            @for($i=0; $i < count($test['recipes'][0]['instructions']); $i++)
                @if($i == count($test['recipes'][0]['instructions'])-1)
                    <div class="row">
                        <div class="badge badge-success" style="margin:0.2rem auto; font-size: large;">
                            <h3 style="margin:0;">{{ $test['recipes'][0]['instructions'][$i]['display_text'] }}</h3>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-8 text-justify" style="margin:0.2rem auto; font-size: large;">
                            {{ $test['recipes'][0]['instructions'][$i]['display_text'] }}
                        </div>
                    </div>
                @endif
            @endfor
        @endif
    </div>
@endsection