
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> {!! session('success') !!} </strong>
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> {!! session('info') !!} </strong> <!-- ini juga ada tanda seru 2 -- >
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> {!! session('warning') !!} </strong> <!-- ini juga ada tanda seru 2 -- >
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> {!! session('error') !!} </strong> <!-- ini juga ada tanda seru 2 -- >
    </div>
@endif

@if (count($errors) > 0) <!-- Ini prosesnya gimana pi, dari sini sampai bawah-->
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
            <p>Perhatian.</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    </div>

@endif