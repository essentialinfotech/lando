@extends('backend.master')

@section('content')
<section class="content p-3 col-lg-9 m-auto">
    <div class="card card-info">
        <div class="card-header py-3 d-flex flex-row  justify-content-between">
            <h6 class="m-0 font-weight-bold ">All Members</h6>
        <a href="{{route('team.create')}}" class="btn  btn-success">Add Member</a>
          </div>
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th> Name</th>
                <th>Position</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($members as $member)
            <tr>
            <td>{{$member->name}}</td>
              <td>{{$member->position}}</td>
              
              <td>
                <img src="{{url($member->image)}}" alt="post-img" style="width: 60px;height:50px;">
              
              </td>
              <td>
                @if ($member->status == 1)
                  Active
                    @else
                    Inactive
                  @endif
    
               </td>
              <td class="text-right py-0 align-middle">
                <div class="btn-group btn-group-sm">
                <a href="{{route('team.edit',$member->id)}}" class="btn btn-info">Edit</a>
                  <a href="{{route('team.destroy',$member->id)}}" class="btn btn-danger">Delete</a>
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