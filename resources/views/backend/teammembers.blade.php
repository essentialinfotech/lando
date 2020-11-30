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
              <h3 class="card-title">Team Member</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('team.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name"  placeholder="Name">
                  </div>
                  @error('name')
                  <strong class="text-danger">{{$message}}</strong>
                 @enderror
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Position</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="position" placeholder="Position">
                  </div>
                  @error('position')
                  <strong class="text-danger">{{$message}}</strong>
                 @enderror
                </div>
               
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                    <select class="form-control" name="status" id="">
                      <option>Select status</option>
                      <option value="1">Actitive</option>
                      <option value="0">Inactive</option>
                    </select>
                    @error('status')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div>
              

                <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" class="form-control" name="image" id="" placeholder="Image" aria-describedby="fileHelpId">
                
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