 @extends('admin.admin_master')
         
         @section('admin')

    <div class="py-12">
        
    <div class="container">
        <div class="row">
         <h4></h4>
         <a href="{{route('addPost')}}"><button class="btn btn-info">Add Post</button></a>
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

              <div class="card-header">All Post</div>
          
            <table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="10%">Title</th>
      <th scope="col" width="10%">Image</th>
      <th scope="col" width="15%">Post Content</th>
      <th scope="col" width="15%">Created At</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
            @php($i=1)
      @foreach($blogs as $blog)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$blog->title}}</td>  
      <td><img src="{{asset($blog->post_image)}}" style="height: 40px; width:70px;" alt="no image"></td>
      <td>{{$blog->post_content}}</td>
      <td>{{$blog->created_at->diffForHumans()}}</td>  
      

          <td>
            <a href="{{url('editBlog/'.$blog->id)}}" class="btn btn-info">Edit</a>
           <a href="{{url('deleteBlog/'.$blog->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
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

