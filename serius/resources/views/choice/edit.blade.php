@extends('layout.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>YukPilih 3 | Edit Choice</title>
<head>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/')}}/dist/css/adminlte.min.css">
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Choice</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
<form action="{{route('division.update', $divisi->id)}}" method="post">
@csrf
@method("PUT")
<div class="col-md-12 mt-3">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Choice</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Choice</label>
                <input type="text" value="{{$choi->choice}}" name="choice" class="form-control">
              </div>
              <div class="form-group">
                <select name="poll_id" id="">
                  @foreach($choi as $c)
                  <option value="{{ $c->id }}">{{ $c->poll_id }}</option>
                  @endforeach
                </select>
              </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
                <a href="{{route('choice.index')}}" class="btn btn-secondary ml-3">Cancle</a>
                <button type="submit" class="btn btn-success ml-3">Edit</button>
</form>
</div>
</body>
</html>
@endsection