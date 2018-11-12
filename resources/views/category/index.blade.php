@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Category<a href="{{ route('category.create') }}" class="btn btn-success btn-sm pull-right"><span class="fa fa-plus-circle"></span></a></div>

                <div class="panel-body">
                    @include('template.alert')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Created At</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th>Update At</th>
                                <th><span class="">Actions</span></th>
                            </thead>
                            <tbody>
                                @foreach ($category as $kategori)
                                    <tr>
                                        <td></td>
                                        <td>{{ $kategori->created_at }}</td>
                                        <td>{{ $kategori->kategori }}</td>
                                        <td>{{ $kategori->keterangan }}</td>
                                        <td>{{ $kategori->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('category.edit', $kategori->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>
                                            <a href="{{ route('category.destroy', $kategori->id) }}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
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