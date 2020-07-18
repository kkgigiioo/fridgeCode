@if(session()->has('warning'))
    <div class="alert alert-warning" role="alert">
        {{ session()->get('warning') }}
    </div>
@endif