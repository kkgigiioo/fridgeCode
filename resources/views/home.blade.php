@extends('layouts.app')
@section('title')
HOME
@endsection
@section('content')
    <div class="row">
        <?php
            foreach ($data as $key2=>$datas){
                echo '
                    <div class="card text-center" style="width: 18rem; margin-top:1rem; margin-left:2rem;">
                        <div class="card-body">
                            <h5 class="card-title">', $datas['name'], '</h5>
                            <h6 class="card-subtitle mb-2 text-muted">', $datas['barcode'], '</h6>
                            <p class="card-text">', $datas['brand'], '</p>
                        </div>
                    </div>
                ';
            }
        ?>
    </div>
@endsection