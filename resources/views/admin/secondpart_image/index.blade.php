@extends('layouts.dashboard')
@section('second')
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
          <div class="col-md-8">
          	@if(session('delete'))
		          <div class="alert alert-success">
		            {{session('delete')}}
		          </div>
	         	@endif
          	<div class="card">
              <div class="card-header">
                <h3 class="card-title">Second Image Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>SL NO.</th>
                      <th>Image Number</th>
                      <th>Image Title</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($all_image as $index => $image)
                      <tr>
                        <td>{{$all_image->firstitem() + $index}}</td>
                        <td>{{$image->image_number}}</td>
                        <td>{{$image->image_title}}</td>
                        <td><img src="{{asset('uploads/firstpart/image/')}}/{{$image->first_single_image}}" width="50px" alt=""></td>
                        <td>
                          <a href="{{url('second_image_active')}}/{{$image->id}}" class="btn @php echo $image->status == 0?'bg-maroon':'bg-blue'@endphp">
                            @php
                            echo $image->status == 0?'Off&nbsp&nbsp&nbsp<i class="fa fa-toggle-off" aria-hidden="true"></i>':'On&nbsp&nbsp&nbsp<i class="fa fa-toggle-on" aria-hidden="true"></i>'
                            @endphp
                          </a>
                        </td>
                        <td>
                          <a href="{{url('second_edit_image')}}/{{$image->id}}" class="btn bg-navy"><i class="fa fa-edit" aria-hidden="true"></i></a>
                          <a href="{{url('second_image_delete')}}/{{$image->id}}" class="btn bg-orange"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                    @empty
                    <tr>
                      <td class="text-center text-danger" colspan="6">No Data Found</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                <div>
                  {{$all_image->links()}}
                </div>
            </div>
              </div>
          </div>
        </div>
          	<div class="col-md-4">
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
	              <form action="{{url('second_image_post')}}" method="POST" enctype="multipart/form-data">
	              	@csrf
	                <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Image Number</label>
                      <input type="text" name="image_number" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Number">
                    </div>
                    @error('image_number')
                    <div class="alert alert-danger">
                      <small>{{$message}}</small>
                    </div>
                    @enderror
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Image Title</label>
	                    <input type="text" name="image_title" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Title">
	                  </div>
	                  @error('image_title')
			              <div class="alert alert-danger">
			                <small>{{$message}}</small>
			              </div>
		                @enderror
	                <div class="form-group">
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