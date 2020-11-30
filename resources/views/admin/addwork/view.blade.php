@extends('layouts.dashboard')
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
              <li class="breadcrumb-item"><a href="#">Add Work</a></li>
              <li class="breadcrumb-item active">View Work</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>

    <section class="content">
    	<div class="row">
          <!-- left column -->
          <div class="col-md-8 m-auto">
          	<div class="card">
              <div class="card-header">
                <h3 class="card-title">Show Individual Work</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <tbody>
                  	<tr>
                  		<th>Work Title</th>
                  		<td>{{$get_work->work_title}}</td>
                  	</tr>
                  	<tr>
                  		<th>Work Paragraph</th>
                  		<td>{{$get_work->work_paragraph}}</td>
                  	</tr>
                  	<tr>
                  		<th>Image</th>
                  		<td>
                  			<div class="row">
		                  		@foreach($get_image as $multiple)
				                    <div class="col-md-6 my-1">
				                      <img src="{{asset('uploads/work/work_details')}}/{{$multiple->work_multiple_image}}" alt="" width="50px">
				                    </div>
		                    	@endforeach
                    		</div>
                  		</td>
                  	</tr>
                  </tbody>
                </table>
            </div>
              </div>
          </div>
        </div>
          
    	</div>
    </section>
@endsection