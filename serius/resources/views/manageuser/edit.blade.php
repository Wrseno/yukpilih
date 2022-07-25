@extends('layout.admin')
@section('content')
!DOCTYPE html>
<html lang="en">
<head>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>YukPilih 3 | Edit User</title>
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
            <h1 class="m-0">Edit User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
<form action="{{route('manageuser.update', $user->id)}}" method="post">
@csrf
@method('PUT')
<div class="col-md-12 mt-3">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create User</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Username</label>
                <input type="text" name="username" id="inputName" class="form-control" value="{{$user->username}}">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Password</label>
                <input name="password" value="{{$user->password}}" type="password" id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Role</label>
                <select id="inputStatus" class="form-control custom-select" name="role">
                <option value="">-- SELECT ROLE --</option>
                  <option value="admin">Administrator</option>
                  <option value="user">User</option>
                </select>
            </div>
              <div class="form-group">
                <label for="inputStatus">Division Id</label>
                <select id="inputStatus" class="form-control custom-select" name="division_id">
                    <option value="">-- SELECT DIVISION --</option>
                 @foreach($divisi as $d)
                  <option value="{{$d->id}}">{{$d->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
                <a href="{{route('manageuser.index')}}" class="btn btn-secondary">Cancle</a>
                <button type="submit" class="btn btn-success">Edit</button>
</form>
</div>
</body>
</html>
@endsection