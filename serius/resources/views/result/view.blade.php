@extends('layout.admin')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Poll</title>
</head>
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
            <h1 class="m-0">Result Poll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Result Poll</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      @foreach($data as $d)
      <div class="card">
        <div class="card-header">
        <h1>{{$d['title']}}</h1>
        <div class="card-body">
          <p>created by {{$d['created_by']}} | deadline {{$d['deadline']}}</p>
          <p>{{$d['description']}}</p>
          <br>
          {{$d['pilih1']}}
          {{$d['hasil1']}}
          <br>
          {{$d['pilih2']}}
          {{$d['hasil2']}}
          <br>
          {{$d['pilih3']}}
          {{$d['hasil3']}}
          <br>
        </div>
        </div>
      </div>
      @endforeach

          
</body>
</html>
@endsection