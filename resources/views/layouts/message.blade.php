<div class="row">
    @if (Session::has('error'))
    <div class="card-panel black darken-3 white-text">
        {{Session::get('error')}}
    </div>
    @endif
    @if (Session::has('notice'))
        <div class="card-panel green darken-3 white-text">
    {{Session::get('notice')}}
    </div> 
    @endif
    @if (count($errors) > 0)
        <div class="card-panel orange white-text">
            @foreach ($errors->all() as $error)
                <div class="darken-3 white-text">{{ $error }}</div>
            @endforeach
        </div>
    @endif
</div>