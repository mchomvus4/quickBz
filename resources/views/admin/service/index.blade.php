 @extends('admin.admin_master')
         
         @section('admin')

    <div class="py-12">
        
    <div class="container">
        <div class="row">
         <h4></h4>
         <a href="{{route('addService')}}"><button class="btn btn-info">Add Services</button></a>
          <div class="col-md-12">
            <div class="card">
            @if(session('success'))
            <div class="alert alert-success alert-fade show" role="alert">
              <strong>{{session('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif

              <div class="card-header">All Post</div>
          
            <table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="10%">Title</th>
      <th scope="col" width="10%">Image</th>
      <th scope="col" width="15%">Description</th>
      <th scope="col" width="15%">Created At</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
            @php($i=1)
      @foreach($services as $service)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$service->title}}</td>  
      <td><img src="{{asset($service->service_image)}}" style="height: 40px; width:70px;" alt="no image"></td>
      <td>{{$service->description}}</td>
      <td>{{$service->created_at->diffForHumans()}}</td>  
      

          <td>
            <a href="{{url('editService/'.$service->id)}}" class="btn btn-info">Edit</a>
           <a href="{{url('deleteService/'.$service->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
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

