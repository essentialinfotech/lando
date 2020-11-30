@extends('backend.master')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 m-auto">
          <!-- general form elements -->
          <div class="card card-primary ">
            <div class="card-header py-3 d-flex flex-row  justify-content-between">
              <h3 class="m-0 font-weight-bold ">Footer Menu</h3>
           
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('menu.update',$menu->id)}}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name"  value="{{$menu->name}}">
                </div>

                @error('name')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
               
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="status" id="">
                    <option>Select status</option>
                    <option @if ($menu->status == 1) selected @endif value="1">Actitive</option>
                    <option @if ($menu->status == 0) selected @endif value="0">Inactive</option>
                  </select>
                  @error('status')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
                </div>
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