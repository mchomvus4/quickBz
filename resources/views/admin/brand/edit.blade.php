 @extends('admin.admin_master')
         
         @section('admin')

         @if(session('success'))
            <div class="alert alert-success alert-fade show" role="alert">
              <strong>{{session('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
    <div class="py-12">
        
    <div class="container">
        <div class="row">
       <div class="col-md-8">
            <div class="card">
               <div class="card-header">Edit Brand</div>
               <div class="card-body">
               <form action="{{url('updateBrand/'.$brands->id)}}" method="POST" enctype="multipart/form-data">
                 @csrf
                 <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
                   <div class="form-group">
                     <label for="brandName">Update Brand Name</label>
                     <input type="text" class="form-control" name="brand_name" value="{{$brands->brand_name}}">
                     @error('brand_name')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                   </div>
                   <div class="form-group">
                     <label for="brandImage">Update Brand Image</label>
                     <input type="file" class="form-control" name="brand_image" value="{{$brands->brand_image}}">
                     @error('brand_image')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                   </div>

                   <div class="form-group">
                    <img src="{{asset($brands->brand_image)}}" style="width:400px; height:200px">

                   </div>



                   <button type="submit" class="btn btn-success">Update Brand</button>
               </form>
               </div>
        </div>
        </div>

  </div>
 </div>
</div>

@endsection

