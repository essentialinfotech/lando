@extends('backend.master')

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 m-auto">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Add Logo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('logo.store') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="Active" name="status">
                          <label class="form-check-label">Active</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="Active" name="status" checked>
                          <label class="form-check-label">Inactive</label>
                        </div>
                      </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
</section>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 m-auto">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Manage Logo</h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Logo</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   @php($i = 1)
                   @foreach($logo as $all_logo)
                    <tr>
                   <td>{{$i++}}</td>
                    <td><img src="{{ asset($all_logo->image) }}" alt="post-image" width="100" height="100" class="img-responsive post-image" />
                    </td>
                    <td>{{$all_logo->status}}</td>
                    <td><a href="{{url('/admin/logo/update',$all_logo->id)}}" class="action-btn" data-toggle="modal" data-target="#exampleModal{{$all_logo->id}}"><i class="far fa-edit"></i></a>
                    @csrf
                    @method('DELETE')
                  <a href="{{url('/admin/logo/destroy',$all_logo->id)}}" type="submit" id="del" onclick="myFunction()" class="action-btn"><i class="fas fa-times"></i></a></td></tr>


                  <div class="modal fade" id="exampleModal{{$all_logo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                             <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                             </button>
                                                 </div>
                                                <div class="modal-body">

                    <form action="{{ url('/admin/logo/update', $all_logo->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="logo" id="logo">
                                                <label class="custom-file-label" for="logo">Edit Logo</label>
                                            </div>
                                        </div>

                         <div class="form-group" >
                                            <p>Edit Status:</p>
                                        <input type="radio" id="active" name="status" value="Active">
                                        <label for="active">Active</label><br>
                                        <input type="radio" id="inactive" name="status" value="Inactive">
                                        <label for="inactive">Inactive</label><br>
                        </div>
                        <div class="modal-btn text-center">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                   </tbody>
                   @endforeach
                </table>
              </div>
        </div>
    </div>
</div>
</section>

                            
<script>
function myFunction() {
  
  if (confirm("Are you sure to delete this item ?")) 
  {
   return true;
  } else {
    return false;
  }
  document.getElementById("del");
}
 </script>
@endsection