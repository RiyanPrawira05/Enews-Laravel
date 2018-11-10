@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('proses') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('angka1') ? ' has-error' : '' }}">
                            <label for="angka1" class="col-md-4 control-label">Angka 1</label>

                            <div class="col-md-6">
                                <input id="angka1" type="number" class="form-control" name="angka1" value="{{ old('angka1') }}" required autofocus>

                                @if ($errors->has('angka1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('angka1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('angka2') ? ' has-error' : '' }}">
                            <label for="angka2" class="col-md-4 control-label">Angka2</label>

                            <div class="col-md-6">
                                <input id="angka2" type="number" class="form-control" name="angka2" required>

                                @if ($errors->has('angka2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('angka2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('operasi') ? ' has-error' : '' }}">
                            <label for="operasi" class="col-md-4 control-label">operasi</label>

                            <div class="col-md-6">
                                <select id="operasi" class="form-control" name="operasi" required>
                                    @foreach ($operasi as $operation)
                                        <option value="{{$operation}}">{{$operation}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('operasi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('operasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if(isset($hasil))
                         <div class="form-group{{ $errors->has('hasil') ? ' has-error' : '' }}">
                            <label for="hasil" class="col-md-4 control-label">hasil</label>

                            <div class="col-md-6">
                                <input id="hasil" type="number" class="form-control" name="hasil" required readonly="readonly" value="{{ $hasil }}">

                                @if ($errors->has('hasil'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hasil') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    PROSES
                                </button>
                                 <button type="reset" class="btn btn-primary">
                                    CANCEL
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
