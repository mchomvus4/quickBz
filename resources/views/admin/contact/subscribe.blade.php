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
         <h4>Customer Email Address</h4>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">All Customer Email Address</div>
            <table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL</th>
      <th scope="col" width="15%">Email Address</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
            @php($i=1)
      @foreach($subscribes as $subscribe)
    <tr>
     <th scope="row">{{$i++}}</th>
      <td>{{$subscribe->email}}</td>  
          <td>
        
           <a href="{{url('deleteEmail/'.$subscribe->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
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