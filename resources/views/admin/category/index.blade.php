<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         All Category<b></b>
        
        </h2>
    </x-slot>

    <div class="py-12">
        
    <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
            {{-- @if(session('success'))
            <div class="alert alert-success alert-fade show" role="alert">
              <strong>{{session('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif --}}




              <div class="card-header">All Category</div>
          
            <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Category Name</th>
      <th scope="col">User</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <!-- @php($i=1) -->
      @foreach($categories as $category)
    <tr>
      <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
      <td>{{$category->catagory_name}}</td>
      <td>{{$category->user->name}}</td>
      <td>
        @if($category->created_at == NULL)
        <span class="text-danger">No Date Set</span>
        @else
        {{$category->created_at->diffForHumans()}}
        @endif
      </td>
          <td>
            <a href="{{url('editCategory/'.$category->id)}}" class="btn btn-info">Edit</a>
           <a href="{{url('softdelete/'.$category->id)}}" class="btn btn-danger">Delete</a>
          </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$categories->links()}}
      </div>
    </div>

<div class="col-md-4">
        <div class="card">
          <div class="card-header">Add Category</div>
          <div class="card-body">
          <form action="{{route('storeCategory')}}" method="POST">
            @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" class="form-control" name="catagory_name">
                @error('category')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Add Category</button>
</form>
</div>
        </div>
        </div>

  </div>
 </div>




<!-- Trash part -->

    <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="card">

              <div class="card-header">Trash List</div>
          
            <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Category Name</th>
      <th scope="col">User</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <!-- @php($i=1) -->
      @foreach($trash as $category)
    <tr>
      <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
      <td>{{$category->catagory_name}}</td>
      <td>{{$category->user->name}}</td>
      <td>
        @if($category->created_at == NULL)
        <span class="text-danger">No Date Set</span>
        @else
        {{$category->created_at->diffForHumans()}}
        @endif
      </td>
          <td>
            <a href="{{url('restore/'.$category->id)}}" class="btn btn-info">Restore</a>
            <a href="{{url('delete/'.$category->id)}}" class="btn btn-danger">P Delete</a>
          </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$trash->links()}}
      </div>
    </div>

<div class="col-md-4">
        
        </div>

  </div>
 </div>
<!-- End Trash -->
    </div>
</x-app-layout>
