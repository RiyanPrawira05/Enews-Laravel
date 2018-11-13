@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Pengguna <a href="{{ route('pengguna.create') }}" class="btn btn-success btn-sm pull-right"><span class="fa fa-plus-circle"></span></a></div>

                <div class="panel-body">
                    @include('template.alert')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Created At</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Update At</th>
                                <th><span class="">Actions</span></th>
                            </thead>
                            <tbody>
                                @php ($no = 1)
                                @foreach ($data as $user)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('pengguna.edit', $user->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>
                                        <a href="{{ route('pengguna.destroy', $user->id) }}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
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