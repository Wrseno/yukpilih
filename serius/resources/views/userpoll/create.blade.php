@extends('layout.admin')
@section('content')
!DOCTYPE html>
<html lang="en">
<head>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>YukPilih 3 | Vote</title>
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
            <h1 class="m-0">Vote</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Vote</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
<form action="{{route('userpoll.store')}}" method="post">
@csrf
<div class="col-md-12 mt-3">
          @foreach ($choice as $ch)
          <div class="col-md-6 mt-3">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Vote</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">{{ $ch->choice }}</label>
                <input type="hidden" name="choice_id" id="inputName" class="form-control" value="{{$ch->id}}">
                <input type="hidden" name="poll_id" id="inputName" class="form-control" value="{{$ch->poll_id}}">
              </div>
                <a href="{{route('userpoll.index')}}" class="btn btn-secondary">Cancle</a>
                <button type="submit" class="btn btn-success">Vote</button>
                </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
              @endforeach
</div>
            
                
</form>
</div>
</body>
</html>
@endsection