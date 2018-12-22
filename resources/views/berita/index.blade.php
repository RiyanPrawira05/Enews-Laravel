@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Berita</div>

                <div class="panel-body">
                    @include('template.alert')

                    <div class="text-center">
                        <form class="form-horizontal" method="get">
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <span class="fa fa-search"></span>
                                    <input class="form-control" type="text" name="search" id="search" value=" {{ request()->input('search') }}" placeholder="Type here" autofocus>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Created At</th>
                                <th>User</th>
                                <th>Header</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Status</th>
                                <th>Kategori</th>
                                <th>Update At</th>
                                <th><span class="fa fa-cogs"></span></th>
                                <th><a href="{{ route('berita.create') }}" class="btn btn-success btn-sm pull-right"><span class="fa fa-plus-circle"></span></a></th>
                            </thead>
                            <tbody>

                                <p> Data Berita : {{ $berita->count() }} </p>

                                @if (count($berita) != 0)

                                @foreach ($berita as $news)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $news->created_at }}</td>
                                        <td>{{ $news->user->name }}</td>
                                        <td>
                                            @if (!empty($news->header))
                                                <img src="{{ asset($news->header) }}" class="img-responsive">
                                            @else
                                                <span class="label label-danger">NULL</span>
                                            @endif
                                        </td>
                                        <td>{{ $news->judul }}</td>
                                        <td>{{ $news->isi }}</td>

                                        <!-- <td>{{ $news->status == 1 ? 'Publish' : 'Draft' }}</td> -->

                                        <td>
                                            @if ($news->status == 1)
                                                <span class="label label-success">PUBLISH</span>
                                            @else
                                                <span class="label label-primary">DRAFT</span>
                                            @endif
                                        </td>
                                        <td>{{ $news->category->kategori }}</td>
                                        <td>{{ $news->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('berita.edit', $news->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
                                            <a href="{{ route('berita.destroy', $news->id) }}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                @else 
                                    <td colspan="15" align="center"><span class="label label-danger">Data Empty !!</span></td>
                                @endif
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection