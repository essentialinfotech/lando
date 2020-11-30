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
          <!-- left column --> 
          	<div class="col-md-6 m-auto">
            <!-- general form elements -->
            	@if(session('update_success'))
		          <div class="alert alert-success">
		            {{session('update_success')}}
		          </div>
	         	@endif
	            <div class="card card-primary">
	              <div class="card-header">
	                <h3 class="card-title">Create Second Section For Image</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->
	              <form action="{{url('sec_edit_description_post')}}" method="POST" enctype="multipart/form-data">
	              	@csrf
	                <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Second Section Title</label>
                      <input type="text" name="first_title" class="form-control" id="exampleInputEmail1" value="{{$desc_edit->first_title}}">
                      <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" value="{{$desc_edit->id}}">
                    </div>
                    @error('image_number')
                    <div class="alert alert-danger">
                      <small>{{$message}}</small>
                    </div>
                    @enderror
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Second Section Paragraph</label>
	                    <input type="text" name="first_paragraph" class="form-control" id="exampleInputEmail1" value="{{$desc_edit->first_paragraph}}">
	                  </div>
	                  @error('image_title')
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