@extends('layout.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>YukPilih 3 | Create Choice</title>
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
            <h1 class="m-0">Create Choice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Choice</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
<form action="{{route('choice.store')}}" method="post">
@csrf
<div class="col-md-12 mt-3">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create Choice</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Choice</label>
                <div class="form-group">
                <input type="text" name="choice[]" class="form-control">
                <input type="button" class="btn btn-success" onclick="tambah()" value="+ Add">
                <input type="button" class="btn btn-success" onclick="hapus()" value="+ hapus">
                </div>
                <input type="hidden" name="poll_id" class="form-control" value="{{$poll->id}}" >
              </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
                <a href="{{route('choice.index')}}" class="btn btn-secondary ml-3">Cancle</a>
                <button type="submit" class="btn btn-success ml-3" >Create</button>
</form>
</body>
<script type="text/javascript">

  var a=0;
  function hapus(){
    var form = document.querySelector(".form-tambah");
    //const input = '<input type="text" name="choice[]" class="form-control" id="form-tambah">';
    form.innerHTML = '';
    //console.log(a);

  }
  function tambah(){
    var form = document.querySelector(".form-group");
    //var html
    form.innerHTML += '<div class="form-tambah">';

    form.innerHTML += '</div>';
    console.log("ss");
    var a = document.querySelector(".form-tambah");
    a.innerHTML += '<input type="text" name="choice[]" class="form-control" id="form-tambah">';
    a.innerHTML += '<input type="button" class="btn btn-success" onclick="tambah()" value="+ Add">';
    a.innerHTML += '<input type="button" class="btn btn-danger" onclick="hapus()" value="Remove">';
  }

  
</script>

</html>
@endsection