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
              <h3 class="card-title">Social Links</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('social.store')}}">
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Facebook</label>
                  <div class="col-sm-10">
                    <input type="text" name="facebook" class="form-control" i placeholder="Facebook">
                  </div>
                  @error('facebook')
                  <strong class="text-danger">{{$message}}</strong>
                 @enderror
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Twitter</label>
                  <div class="col-sm-10">
                    <input type="text" name="twitter" class="form-control"  placeholder="Twitter">
                  </div>
                  @error('twitter')
                  <strong class="text-danger">{{$message}}</strong>
                @enderror
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Linkedin</label>
                  <div class="col-sm-10">
                    <input type="text" name="linkedin" class="form-control"  placeholder="Linkedin">
                  </div>
                  @error('linkedin')
                  <strong class="text-danger">{{$message}}</strong>
                @enderror
                </div>
             
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="submit" class="btn btn-default float-right">Cancel</button>
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