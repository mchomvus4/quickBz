
  @extends('admin.admin_master')
         
         @section('admin')

<div class="col-lg-12">
									<div class="card card-default">
           
										<div class="card-header card-header-border-bottom">
											<h2>Update Contact </h2>
										</div>
										<div class="card-body">
										 <form action="{{url('updateContact/'.$contacts->id)}}" method="POST">
            @csrf
											
											
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Address</label>
													<textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Address">{{$contacts->address}}</textarea>
              @error('address')
                <span class="text-danger">{{$message}}</span>
                @enderror
												</div>

            	<div class="form-group">
													<label for="exampleFormControlInput1">Email</label>
													<input type="email" name="email" value="{{$contacts->email}}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email Address">
												 @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
												</div>
            	<div class="form-group">
													<label for="exampleFormControlInput1">Phone Number</label>
													<input type="text" name="phone" value="{{$contacts->phone}}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Phone Number">
												 @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
												</div>
											
											
												<div class="form-footer pt-4 pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-success btn-default">Update</button>
												
												</div>
											</form>
										</div>
									</div>

									
								
								</div>
         @endsection