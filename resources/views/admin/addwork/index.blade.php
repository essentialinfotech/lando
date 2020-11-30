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
          <div class="col-md-8">
          	@if(session('forcedelete_success'))
		          <div class="alert alert-success">
		            {{session('forcedelete_success')}}
		          </div>
	         	@endif
          	<div class="card">
              <div class="card-header">
                <h3 class="card-title">Work Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>SL NO.</th>
                      <th>Work Title</th>
                      <th>Work Paragraph</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@forelse($all_works as $index => $work)
                    <tr>
                      <td>{{$all_works->firstitem() + $index}}</td>
                      <td>{{\Illuminate\Support\str::limit($work->work_title,20,'....')}}</td>
                      <td>{{\Illuminate\Support\str::limit($work->work_paragraph,20,'....')}}</td>
                      <td>
                      	<!-- <div class="row"> -->
                      	@foreach($work->get_multiple_photo as $multiple)
		                    <div class="col-md-4 my-1">
		                      <img src="{{asset('uploads/work/work_details')}}/{{$multiple->work_multiple_image}}" alt="" width="50px">
		                    </div>
                    	@endforeach
                    	<!-- </div> -->
                      </td>
                      <td>
                      	<a style="font-size: 10px;" href="{{url('work_active')}}/{{$work->id}}" class="btn @php echo $work->status == 0?'bg-maroon':'bg-blue'@endphp">
	                      @php
	                      echo $work->status == 0?'Off&nbsp&nbsp&nbsp<i class="fa fa-toggle-off" aria-hidden="true"></i>':'On&nbsp&nbsp&nbsp<i class="fa fa-toggle-on" aria-hidden="true"></i>'
	                      @endphp
	                    </a>
                      </td>
                      <td>
                      	<a style="font-size: 10px;" href="{{url('view_work')}}/{{$work->id}}" class="btn bg-navy"><i class="fa fa-eye" aria-hidden="true"></i></a>
 						<a style="font-size: 10px;" href="#" class="btn bg-dark"><i class="fa fa-edit" aria-hidden="true"></i></a>
                      	<a style="font-size: 10px;" href="{{url('delete_work')}}/{{$work->id}}" class="btn bg-maroon"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                    	<td colspan="6" class="text-center text-danger">No Data Found</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                <div>
                	{{$all_works->links()}}
                </div>
            </div>
              </div>
          </div>
        </div>
          	<div class="col-md-4">
            <!-- general form elements -->
            	@if(session('upload_success'))
		          <div class="alert alert-success">
		            {{session('upload_success')}}
		          </div>
	         	@endif
	            <div class="card card-primary">
	              <div class="card-header">
	                <h3 class="card-title">Create First Section Work</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->
	              <form action="{{url('add_work_post')}}" method="POST" enctype="multipart/form-data">
	              	@csrf
	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Work Title</label>
	                    <input type="text" name="work_title" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Title">
	                  </div>
	                  @error('work_title')
			              <div class="alert alert-danger">
			                <small>{{$message}}</small>
			              </div>
		              @enderror
	                  <div class="form-group">
	                    <label for="exampleInputPassword1">Work Paragraph</label>
	                    <textarea name="work_paragraph" class="form-control" cols="7" rows="3" placeholder="Enter Your Paragraph"></textarea>
	                    
	                  </div>
	                  @error('work_paragraph')
			              <div class="alert alert-danger">
			                <small>{{$message}}</small>
			              </div>
		              @enderror
	                <!-- <div class="form-group">
		              <label>Add Product Thumbnail Photo</label>
		              <input type="file" name="work_single_image" class="form-control" value="{{old('product_thumbnail_photo')}}">
		              @error('product_thumbnail_photo')
		              <div class="alert alert-danger">
		                <small>{{$message}}</small>
		              </div>
		              @enderror
		            </div> -->
		            <div class="form-group">
		              <label>Add [*Two] Work Photo</label>
		              <input type="file" name="work_multiple_image[]" class="form-control" value="{{old('product_thumbnail_photo')}}" multiple>
		              @error('work_multiple_image')
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