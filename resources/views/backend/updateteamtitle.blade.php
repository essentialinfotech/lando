@extends('backend.master')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 m-auto">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Team Title and Description</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
          <form role="form" method="POST" action="{{route('team.store')}}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control"  name="title"  placeholder="Enter title">
                </div>
                @error('title')
                    <strong class="text-danger">{{$message}}</strong>
                  @enderror
               
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="form-control" name="description" id="" rows="3"></textarea>
                </div>
                @error('description')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
               
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection