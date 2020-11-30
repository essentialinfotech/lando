@extends('backend.master')

@section('content')
<section class="content p-3  col-lg-9 m-auto">
    <div class="card card-info">
        <div class="card-header py-3 d-flex flex-row  justify-content-between">
            <h6 class="m-0 font-weight-bold ">Copyright </h6>
        <a href="{{route('copyright.create')}}" class="btn  btn-success">Add Copyright</a>
          </div>
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th>Copyright Text</th>
                <th>Status</th>
                
              </tr>
            </thead>
            <tbody>
            @foreach ($copyrights as $copyright)
            <tr>
            <td>{{$copyright->copyright}}</td>
            <td>
              @if ($copyright->status == 1)
                Active
                  @else
                  Inactive
                @endif
  
             </td>
              
              
              <td class="text-right py-0 align-middle">
                <div class="btn-group btn-group-sm">
                <a href="{{route('copyright.edit',$copyright->id)}}" class="btn btn-info">Edit</a>
                  <a href="{{route('copyright.destroy',$copyright->id)}}" class="btn btn-danger">Delete</a>
                </div>
              </td>
          </tr>
            @endforeach
           
              
        
             
               

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
  </section>
@endsection