@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Pengguna <a href="{{ route('pengguna.create') }}" class="btn btn-success btn-xs pull-right">ADD</a></div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th><span class="">Actions</span></th>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                <tr>
                                    <td></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('pengguna.edit', $user->id) }}" class="btn btn-xs btn-warning">Edit</a>
                                        <a href="{{ route('pengguna.destroy', $user->id) }}" class="btn btn-xs btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection