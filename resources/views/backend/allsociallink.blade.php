@extends('backend.master')

@section('content')
<section class="content p-3  col-lg-9 m-auto">
    <div class="card card-info">
        <div class="card-header py-3 d-flex flex-row  justify-content-between">
            <h6 class="m-0 font-weight-bold ">All Social Links</h6>
        <a href="{{route('social.create')}}" class="btn  btn-success">Add Social Links</a>
          </div>
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th> facebook</th>
                <th>Twitter</th>
                <th>Linkedin</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($links as $link)
            <tr>
            <td>{{$link->facebook}}</td>
              <td>{{$link->twitter}}</td>
              <td>{{$link->linkedin}}</td>
              
              <td class="text-right py-0 align-middle">
                <div class="btn-group btn-group-sm">
                <a href="{{route('social.edit',$link->id)}}" class="btn btn-info">Edit</a>
                  <a href="{{route('social.destroy',$link->id)}}" class="btn btn-danger">Delete</a>
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