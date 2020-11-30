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
          <form role="form" method="POST" action="{{route('slogun.update',$titles->id)}}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control"  name="title"  value="{{$titles->title}}">
                </div>
                @error('title')
                    <strong class="text-danger">{{$message}}</strong>
                  @enderror
               
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="form-control" name="description" id="" rows="3">{{$titles->description}}</textarea>
                </div>
                @error('description')
                <strong class="text-danger">{{$message}}</strong>
                @enderror

                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="status" id="">
                    <option>Select status</option>
                    <option @if ($titles->status == 1) selected @endif value="1">Actitive</option>
                    <option @if ($titles->status == 0) selected @endif value="0">Inactive</option>
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