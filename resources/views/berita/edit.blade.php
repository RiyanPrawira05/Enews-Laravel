@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Berita</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('berita.update', $berita->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}"> <!-- apakah nama $errors->has('judul') ini harus sesuai dengan nama di database? dan $errors dari mana -->
                            <label for="judul" class="col-md-4 control-label">Judul</label>

                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control" name="judul" value="{{ $berita->judul }}"> <!-- old('') ini apa? -->

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
                                <input type="file" id="header" name="header" required>{{ $berita->header }}

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
                                <textarea id="isi" class="form-control" name="isi">{{ $berita->isi }}</textarea>

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
                                <select id="user" class="form-control" name="user_id" value="{{ old('user') }}">
                                    @foreach($user as $users)
                                            <option value="{{ $users->id }}" {{ $users->id == $berita->user_id ? 'selected' : ''}}>{{ $users->name }}</option>

                                            <!-- Mengambil tabel user(id) dan tabel berita(user_id), apabila sesuai lakukan selected. sesuai pada saat penambahan tabel berita yang dipilih -->

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
                                <select id="kategori" type="text" class="form-control" name="kategori_id">
                                    @foreach ($category as $kategori)

                                        <!-- Logic ini juga bisa untuk selected -->
                                        <!-- @if ($kategori->id == $berita->kategori_id)
                                            <option value="{{ $kategori->id }}" selected="selected">{{ $kategori->kategori }}</option>
                                        @else
                                            <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                        @endif --> 
                                        <!-- Logic ini juga bisa untuk selected -->

                                        <option value="{{ $kategori->id }}" {{$kategori->id == $berita->kategori_id ? 'selected' : '' }}>{{ $kategori->kategori }}</option>
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

                                <input type="radio" id="status" name="status" id="status" value="0" {{$berita->status == 0 ? 'checked' : ''}}> <b>Draft<b></br>
                                <input type="radio" name="status" id="status" value="1" {{$berita->status == 1 ? 'checked' : ''}}> <b>Publish<b>

                                <!-- Mengambil tabel berita(status) dan menyamakan, apabila status nya 0 atau 1 lakukan checked sesuai yang dipilih pada saat penambahan tabel berita -->

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
