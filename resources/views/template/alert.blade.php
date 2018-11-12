
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        {!! session('success') !!}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
     {!! session('error') !!}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <p>Perhatian.</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif