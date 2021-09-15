 @extends('admin.admin_master')
         
         @section('admin')

<div class="col-lg-12">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Create Service </h2>
										</div>
										<div class="card-body">
										 <form action="{{route('storeService')}}" method="POST" enctype="multipart/form-data">
            @csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">Title</label>
													<input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Post Title">
												@error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
												</div>
											
											
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Description</label>
													<textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Write Service Description"></textarea>
													@error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
												</div>
												<div class="form-group">
													<label for="exampleFormControlFile1">Service Image</label>
													<input type="file" name="service_image" class="form-control-file" id="exampleFormControlFile1">
													@error('service_image')
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

         