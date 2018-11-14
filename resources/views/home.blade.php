@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status')) <!-- apakah proses ini sama seperti alert.blade.php pi? dan proses contohnya seperti apa --> 

                        <div class="alert alert-success">
                            {{ session('status') }} <!-- pemanggilan seperti apa ini?? -->
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
