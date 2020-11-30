@extends('backend.master')

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12 m-auto">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> First Section</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('section1.store') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="heading">Heading</label>
                    <input type="text" value ="" class="form-control" name="heading" id="heading" placeholder="First Head">
              </div>
              <div class="form-group">
                    <label for="p1">Left Paragraph</label>
                    <input type="text" value ="" class="form-control" name="para1" id="p1" placeholder="Enter Paragraph">
              </div>

              <div class="form-group">
                    <label for="p1">Left Paragraph</label>
                    <input type="text" value ="" class="form-control" name="para1" id="p1" placeholder="Enter Paragraph">
              </div>
                    <div class="form-group">
                    <label for="exampleInputFile">Right Sides Image</label>
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
                    <label for="exampleInputEmail1">Paragraph 2</label>
                    <input type="text" value ="" class="form-control" name="para2" id="exampleInputEmail1" placeholder="Enter Second Paragraph">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Paragraph 3</label>
                    <input type="text" value ="" class="form-control" name="para3" id="exampleInputEmail1" placeholder="Enter Third Paragraph">
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
        <div class="col-md-12 m-auto">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Manage Section</h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Heading</th>
                    <th>Left Paragraph</th>
                    <th>Right Paragraph</th>
                    <th>Third Paragraph</th>
                    <th>Left Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   @php($i = 1)
                   @foreach($body as $all_section)
                    <tr>
                   <td>{{$i++}}</td>
                   <td>{{$all_section->heading}}</td>
                   <td>{{$all_section->para1}}</td>
                   <td>{{$all_section->para2}}</td>
                   <td>{{$all_section->para3}}</td>
                    <td><img src="{{ asset($all_section->image) }}" alt="post-image" width="100" height="100" class="img-responsive post-image" />
                    </td>
                    <td>{{$all_section->status}}</td>
                    <td><a href="{{url('/admin/section1/update',$all_section->id)}}" class="action-btn" data-toggle="modal" data-target="#exampleModal{{$all_section->id}}"><i class="far fa-edit"></i></a>
                    @csrf
                    @method('DELETE')
                  <a href="{{url('/admin/section1/destroy',$all_section->id)}}" type="submit" id="del" onclick="myFunction()" class="action-btn"><i class="fas fa-times"></i></a></td></tr>


                  <div class="modal fade" id="exampleModal{{$all_section->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                             <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                              </div>
                        <div class="modal-body">

                    <form action="{{url('/admin/section1/update',$all_section->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Edit Heading</label>
                            <input type="text" name="heading" class="form-control" placeholder="Edit First Head" value="{{$all_section->heading}}">
                        </div>
                        <div class="form-group">
                            <label>Edit Left Paragraph</label>
                            <input type="text" name="para1" class="form-control" placeholder="Edit Left Para" value="{{$all_section->para1}}">
                        </div>
                        <div class="form-group">
                            <label>Edit Right Paragraph</label>
                            <input type="text" name="para2" class="form-control" placeholder="Edit Right Para" value="{{$all_section->para2}}">
                        </div>
                        <div class="form-group">
                            <label>Edit Third Paragraph</label>
                            <input type="text" name="para3" class="form-control" placeholder="Edit Third Para" value="{{$all_section->para3}}">
                        </div>
                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="logo">
                                                <label class="custom-file-label" for="logo">Edit Image</label>
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