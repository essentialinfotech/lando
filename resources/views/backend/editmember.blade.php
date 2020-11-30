@extends('backend.master')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 m-auto">
          <!-- general form elements -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Edit Team Member Details</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('team.update',$member->id)}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="name"  value="{{$member->name}}">
                  </div>
                  @error('name')
                  <strong class="text-danger">{{$message}}</strong>
                 @enderror
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Position</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="position" value="{{$member->position}}">
                  </div>
                  @error('position')
                  <strong class="text-danger">{{$message}}</strong>
                 @enderror
                </div>
                
                  <div class="form-group">
                    <label for="">Status</label>
                    <select class="form-control" name="status" id="">
                      <option>Select status</option>
                      <option @if ($member->status == 1) selected @endif value="1">Actitive</option>
                      <option @if ($member->status == 0) selected @endif value="0">Inactive</option>
                    </select>
                    @error('status')
                  <strong class="text-danger">{{$message}}</strong>
                  @enderror
                  </div>
                  

                <div class="form-group">
                  <label for="">Image</label> </br>
                  <img src="{{url($member->image)}}" alt="post-img" style="width: 60px;height:50px;">
                  <input type="file" class="form-control" name="image" id="" placeholder="Image" aria-describedby="fileHelpId">
                  <input type="hidden" name="oldimg" value="{{$member->image}}">
                   
                @error('image')
                  <strong class="text-danger">{{$message}}</strong>
                 @enderror
                </div>
             
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
               
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
          <!-- /.card -->

        </div>
        
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection