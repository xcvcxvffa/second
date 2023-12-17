@extends('masterlayout.mastermain')
@section('content')
@section('title','passwordedit')

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif 

        @if(Session::has('error'))
            <div class="alert alert-danger text-center">
                {{Session::get('error')}}
            </div>
        @endif 

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger text-center">
               
                <li>{{ $error }}</li>
            </div>
            @endforeach
            @endif


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">UPDATE PASSWORS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Old password</label>
                    <input type="password" class="form-control" id="exampleInputunm" placeholder="Enter old passwod"   name="oldpassword">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">New password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter new password" name="npassword">
                  </div> 
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Conform password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter conform password" name="cpassword">
                  </div>
                  
                 
                </div>
                <!-- /.card-body -->

                    <div class="card-footer col-12">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
  @endsection