@extends('layout.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>YukPilih 3 | Edit Poll</title>
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
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
<form action="{{route('poll.update', $poll->id)}}" method="post">
@csrf
@method("PUT")
<div class="col-md-12 mt-3">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Poll</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Title</label>
                <input type="text" name="title" class="form-control" value="{{$poll->title}}">
            </div>
              <div class="form-group">
                <label  for="inputDescription">Description</label>
                <textarea name="description" class="form-control" rows="4" value="{{$poll->description}}">
                {{$poll->description}}
                </textarea>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Deadline</label>
                <input name="deadline" type="datetime-local" class="form-control" value="{{$poll->deadline}}">
              </div>
              <div class="form-group">
                <label for="inputStatus">Created By</label>
                <!-- <input type="text" name="created_by" value="{{auth()->user()->username}}" class="form-control"> -->
                <select name="created_by" id="" class="form-control w-25">
            @foreach ($user as $d)
            <option value="{{$d->id}}">{{$d->username}}</option>
            @endforeach
        </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
                <a href="{{route('poll.index')}}" class="ml-3 btn btn-secondary">Cancle</a>
                <button type="submit" class="btn btn-success">Edit</button>
</form>
</div>
</body>
</html>
@endsection