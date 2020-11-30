@extends('layouts.dashboard')
@section('addwork')
active
@endsection
@section('content')
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Work</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Work</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>

    <section class="content">

    	<div class="row">
          	<div class="col-md-6 m-auto">
            <!-- general form elements -->
            	@if(session('success'))
		          <div class="alert alert-success">
		            {{session('success')}}
		          </div>
	         	@endif
	            <div class="card card-primary">
	              <div class="card-header">
	                <h3 class="card-title">Create Second Section For Image</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->
	              <form action="{{url('second_edit_image_post')}}" method="POST" enctype="multipart/form-data">
	              	@csrf
	                <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Image Number</label>
                      <input type="text" name="image_number" class="form-control" id="exampleInputEmail1" value="{{$get_image->image_number}}">
                      <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" value="{{$get_image->id}}">
                    </div>
                    @error('image_number')
                    <div class="alert alert-danger">
                      <small>{{$message}}</small>
                    </div>
                    @enderror
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Image Title</label>
	                    <input type="text" name="image_title" class="form-control" id="exampleInputEmail1" value="{{$get_image->image_title}}">
	                  </div>
	                  @error('image_title')
			              <div class="alert alert-danger">
			                <small>{{$message}}</small>
			              </div>
		                @enderror
	                <div class="form-group">
                   <div>
                     <img src="{{asset('uploads/secondpart/image/')}}/{{$get_image->first_single_image}}" width="100px" alt="">
                   </div>
		              <label>Image Photo</label>
		              <input type="file" name="first_single_image" class="form-control" value="{{old('first_single_image')}}">
		              @error('first_single_image')
		              <div class="alert alert-danger">
		                <small>{{$message}}</small>
		              </div>
		              @enderror
		            </div>
		            
	                <!-- /.card-body -->
	                <div class="card-footer">
	                  <button type="submit" class="btn btn-primary">Submit</button>
	                </div>
	              </form>
	            </div>
        	</div>
    	</div>
    </section>
@endsection