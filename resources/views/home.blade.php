@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status')) <!-- apakah proses ini sama seperti alert.blade.php pi? --> 
                        <div class="alert alert-success">
                            {{ session('status') }} <!--pemanggilan apaini pi-->
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
