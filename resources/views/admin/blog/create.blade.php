 @extends('admin.admin_master')
         
         @section('admin')

<div class="col-lg-12">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Create Post </h2>
										</div>
										<div class="card-body">
										 <form action="{{route('storePost')}}" method="POST" enctype="multipart/form-data">
            @csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">Title</label>
													<input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Post Title">
													@error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
												</div>
											
											
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Post Content</label>
													<textarea class="form-control" name="post_content" id="exampleFormControlTextarea1" rows="3" placeholder="Write Post content"></textarea>
														@error('post_content')
                <span class="text-danger">{{$message}}</span>
                @enderror
												</div>
												<div class="form-group">
													<label for="exampleFormControlFile1">Post Image</label>
													<input type="file" name="post_image" class="form-control-file" id="exampleFormControlFile1">
														@error('post_image')
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

       