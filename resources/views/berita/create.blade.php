@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Berita</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}"> <!-- apakah nama $errors->has('judul') ini harus sesuai dengan nama di database? dan $errors dari mana -->
                            <label for="judul" class="col-md-4 control-label">Judul</label>

                            <div class="col-md-6">
                                <input id="kategori" type="text" class="form-control" name="judul" value="{{ old('judul') }}" autofocus="autofocus" required> <!-- old('') ini apa? -->

                                @if ($errors->has('judul')) <!-- ini juga dan has itu apa -->
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong> <!-- first ini maksutnya apa pi-->
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('header') ? ' has-error' : '' }}">
                            <label for="header" class="col-md-4 control-label">Header</label>

                            <div class="col-md-6">
                                <input type="file" id="header" class="form-control" name="header" value="{{ old('header') }}" required>

                                @if ($errors->has('header'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('header') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
                            <label for="isi" class="col-md-4 control-label">Isi</label>

                            <div class="col-md-6">
                                <textarea id="isi" class="form-control" name="isi" value="{{ old('isi') }}" required></textarea>

                                @if ($errors->has('isi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('isi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}"> 
                            <label for="user" class="col-md-4 control-label">User ID</label>
                            
                            <div class="col-md-6">
                                <select id="user" class="form-control" name="user_id" value="{{ old('user') }}" required>
                                    @foreach($user as $users)
                                        <option value="{{ $users->id }}">{{ $users->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}"> 
                            <label for="kategori" class="col-md-4 control-label">Kategori ID</label>

                            <div class="col-md-6">
                                <select id="kategori" type="text" class="form-control" name="kategori_id" value="{{ old('kategori') }}" required>
                                    @foreach ($category as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('kategori'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kategori') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}"> 
                            <label for="status" class="col-md-4 control-label">Status</label>

                            <div class="col-md-4">
                                <input type="radio" id="status" name="status" value="0"> <b>Draft<b></br>
                                <input type="radio" name="status" id="status" value="1"> <b>Publish<b>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    Cancel
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
