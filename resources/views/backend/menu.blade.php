@extends('backend.master')

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 m-auto">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Add Menu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
              <form role="form" action="{{ route('menu.store') }}" method="post">
              @csrf
              <div class="form-group">
                    <label for="exampleInputEmail1">Manu Name</label>
                    <input type="text" value ="" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter name">
              </div>

              <div class="form-group">
                    <label for="exampleInputEmail1">Manu Link</label>
                    <input type="text" value ="" class="form-control" name="link" id="link" placeholder="Enter Link">
             </div>
                  <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="Active" name="menu_status">
                          <label class="form-check-label">Active</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="Inactive" name="menu_status" checked>
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
                <h3 class="card-title"> Manage Menu</h3>
              </div>
          <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Menu Name</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php($i = 1)
                  @foreach($menu as $all_menu)
                   <tr>
                    <td>{{$i++}}</td>
                    <td>{{$all_menu->name}}</td>
                    <td>{{$all_menu->link}}</td>
                    <td>{{$all_menu->menu_status}}</td>
                    <td><a href="{{url('/admin/menu/update',$all_menu->id)}}" class="action-btn" data-toggle="modal" data-target="#exampleModal{{$all_menu->id}}"><i class="far fa-edit"></i></a>
                   @csrf
                   @method('DELETE')
                    <a href="{{url('/admin/menu/destroy',$all_menu->id)}}" type="submit" id="del" onclick="myFunction()" class="action-btn"><i class="fas fa-times"></i></a></td></tr>
                    <div class="modal fade" id="exampleModal{{$all_menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                             <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                             </button>
                                                 </div>
                                                <div class="modal-body">

                    <form action="{{ url('/admin/menu/update', $all_menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Edit Menu Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Edit Menu Name" value="{{$all_menu->name}}">
                        </div>
                        <div class="form-group">
                            <label>Edit Link</label>
                            <input type="text" name="link" class="form-control" placeholder="Edit Menu Link" value="{{$all_menu->link}}">
                        </div>

                         <div class="form-group" >
                                            <p>Edit Status:</p>
                                        <input type="radio" id="active" name="menu_status" value="Active">
                                        <label for="active">Active</label><br>
                                        <input type="radio" id="inactive" name="menu_status" value="Inactive">
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
    @endforeach
                  </tbody>
                </table>
              </div>
        </div>   
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