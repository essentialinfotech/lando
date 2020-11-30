@extends('backend.master')

@section('content')
<section class="content p-3  col-lg-9 m-auto">
    <div class="card card-info">
        <div class="card-header py-3 d-flex flex-row  justify-content-between">
            <h6 class="m-0 font-weight-bold ">All Joining Titles And slogun</h6>
        <a href="{{route('join.create')}}" class="btn  btn-success">Add joining Titles And slogun</a>
          </div>
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th> Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
              
              </tr>
            </thead>
            <tbody>
            @foreach ($joins as $join)
            <tr>
            <td>{{$join->title}}</td>
              <td>{{$join->description}}</td>
             
              <td>
                @if ($join->status == 1)
                  Active
                    @else
                    Inactive
                  @endif
    
               </td>
              <td class="text-right py-0 align-middle">
                <div class="btn-group btn-group-sm">
                <a href="{{route('join.edit',$join->id)}}" class="btn btn-info">Edit</a>
                  <a href="{{route('join.destroy',$join->id)}}" class="btn btn-danger">Delete</a>
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