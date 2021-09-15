
  @extends('admin.admin_master')
         
         @section('admin')

<div class="col-lg-12">
									<div class="card card-default">
           
										<div class="card-header card-header-border-bottom">
											<h2>Create Contact </h2>
										</div>
										<div class="card-body">
										 <form action="{{route('storeContact')}}" method="POST">
            @csrf
											
											
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Address</label>
													<textarea class="form-control" name="address"  rows="3" placeholder="Enter Address"></textarea>
              @error('address')
                <span class="text-danger">{{$message}}</span>
                @enderror
												</div>

            	<div class="form-group">
													<label for="exampleFormControlInput1">Email</label>
													<input type="email" name="email" class="form-control"  placeholder="Enter Email Address">
												 @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
												</div>
            	<div class="form-group">
													<label for="exampleFormControlInput1">Phone Number</label>
													<input type="text" name="phone" class="form-control" placeholder="Enter Phone Number">
												 @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
												</div>
											
											
												<div class="form-footer pt-4 pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Submit</button>
												
												</div>
											</form>
										</div>
									</div>

									
								
								</div>
         @endsection