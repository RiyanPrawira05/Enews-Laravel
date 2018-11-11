@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Category<a href="{{ route('category.create') }}" class="btn btn-success btn-xs pull-right">ADD</a></div>

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
                                            <a href="{{ route('category.edit', $kategori->id) }}" class="btn btn-xs btn-warning">Edit</a>
                                            <a href="{{ route('category.destroy', $kategori->id) }}" class="btn btn-xs btn-danger">Delete</a>
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