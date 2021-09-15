<style>
  .btn{
   margin: auto
  }
</style>
@extends('admin.admin_master')
         
         @section('admin')

    <div class="py-12">
        
    <div class="container">
        <div class="row">
         <h4>Home About</h4>
         <a href="{{route('addabout')}}" class="btn"><button class="btn btn-info">Add About</button></a>
          <div class="col-md-12">
            <div class="card">
            {{-- @if(session('success'))
            <div class="alert alert-success alert-fade show" role="alert">
              <strong>{{session('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif --}}

              <div class="card-header">All About Details</div>
          
            <table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="10%">Home Title</th>
      <th scope="col" width="25%">Short Description</th>
      <th scope="col" width="15%">Long Description</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
            @php($i=1)
      @foreach($abouts as $abouts)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$abouts->title}}</td>
      <td>{{$abouts->short_dis}}</td>  
      <td>{{$abouts->long_dis}}</td>  
      

          <td>
            <a href="{{url('editAbout/'.$abouts->id)}}" class="btn btn-info">Edit</a>
           <a href="{{url('deleteAbout/'.$abouts->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
          </td>
    </tr>
    @endforeach
  </tbody>
</table>

      </div>
    </div>



  </div>
 </div>

</div>
@endsection

