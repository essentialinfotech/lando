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
          	@if(session('delete'))
		          <div class="alert alert-success">
		            {{session('delete')}}
		          </div>
	         	@endif
          	<div class="card">
              <div class="card-header">
                <h3 class="card-title">First Image Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>SL NO.</th>
                      <th>Title</th>
                      <th>Paragraph</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($all_desc as $index => $desc)
                      <tr>
                        <td>{{$all_desc->firstitem() + $index}}</td>
                        <td>{{$desc->first_title}}</td>
                        <td>{{$desc->first_paragraph}}</td>
                        <td>
                          <a href="{{url('desc_active')}}/{{$desc->id}}" class="btn @php echo $desc->status == 0?'bg-maroon':'bg-blue'@endphp">
                            @php
                            echo $desc->status == 0?'Off&nbsp&nbsp&nbsp<i class="fa fa-toggle-off" aria-hidden="true"></i>':'On&nbsp&nbsp&nbsp<i class="fa fa-toggle-on" aria-hidden="true"></i>'
                            @endphp
                          </a>
                        </td>
                        <td>
                          <a href="{{url('desc_edit')}}/{{$desc->id}}" class="btn bg-navy"><i class="fa fa-edit" aria-hidden="true"></i></a>
                          <a href="{{url('desc_trash')}}/{{$desc->id}}" class="btn bg-orange"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                    @empty
                    <tr>
                      <td class="text-danger text-center" colspan="5">No Data Found</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                <div class="">
                  {{$all_desc->links()}}
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
	                <h3 class="card-title">Create First Section For Image</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->
	              <form action="{{url('add_description_post')}}" method="POST" enctype="multipart/form-data">
	              	@csrf
	                <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">First Section Title</label>
                      <input type="text" name="first_title" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Number">
                    </div>
                    @error('image_number')
                    <div class="alert alert-danger">
                      <small>{{$message}}</small>
                    </div>
                    @enderror
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">First Section Paragraph</label>
	                    <input type="text" name="first_paragraph" class="form-control" id="exampleInputEmail1" placeholder="Enter Image Title">
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