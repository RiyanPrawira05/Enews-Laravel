@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Berita<a href="{{ route('berita.create') }}" class="btn btn-success btn-sm pull-right"><span class="fa fa-plus-circle"></span></a></div>

                <div class="panel-body">
                    @include('template.alert')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Created At</th>
                                <th>Judul</th>
                                <th>Header</th>
                                <th>Isi</th>
                                <th>User ID</th>
                                <th>Kategori ID</th>
                                <th>Status</th>
                                <th>Update At</th>
                                <th><span class="">Actions</span></th>
                            </thead>
                            <tbody>
                                @php ($no = 1)
                                @foreach ($berita as $news)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $news->created_at }}</td>
                                        <td>{{ $news->judul }}</td>
                                        <td><img src="{{ asset($news->header) }}" class="img-responsive"></td>
                                        <td>{{ $news->isi }}</td>
                                        <td>{{ $news->user->name }}</td> 
                                        <td>{{ $news->category->kategori }}</td>
                                        <td>{{ $news->status == 1 ? 'Publish' : 'Draft' }}</td>
                                        <td>{{ $news->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('berita.edit', $news->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>
                                            <a href="{{ route('berita.destroy', $news->id) }}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
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