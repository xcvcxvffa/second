<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>users detail </title>
      
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.css">
    </head>
    <body>
      <div class="container">
        <h1>form</h1>
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

      <form  action="{{route('edit', ['test' => $test->id]) }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$test->name}}">  
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$test->email}}">
          
        </div>
        <div class="mb-3">
            <label for="formFileSm" class="form-label">Image </label>
            <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
          </div>
          
          <div class="image">
            <img src=" {{ URL::asset('storage/'.$test->image) }}" width="100px" />
          </div>
<br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

                <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
     </div>
  </body>   
</html>