@extends('masterlayout.mastermain')
@section('content')
@section('title','ProfileEdit')

 
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
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @foreach($admin as $admin)
              @endforeach
              <form action="{{route('changeadmin')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">USER NAME</label>
                    <input type="text" class="form-control" id="exampleInputunm" placeholder="Enter name"   name="unm" value="{{$admin->unm}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{$admin->email}}">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose File</label>

                      </div>
                      <div class="custom-file">
                      <img src="{{URL::asset('storage/'.$admin->image)}}" />
                        
                      </div>
                   
                    </div>
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