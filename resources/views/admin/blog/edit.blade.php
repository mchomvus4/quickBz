 @extends('admin.admin_master')
         
         @section('admin')

<div class="col-lg-12">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Update Post </h2>
										</div>
										<div class="card-body">
										 <form action="{{url('updateBlog/'.$posts->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">Title</label>
													<input type="text" name="title" value="{{$posts->title}}" class="form-control" id="exampleFormControlInput1" placeholder="Post Title">
												
												</div>
											
											
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Post Content</label>
													<textarea class="form-control" name="post_content" id="exampleFormControlTextarea1" rows="3" placeholder="Write Post content">{{$posts->post_content}}</textarea>
												</div>
												<div class="form-group">
													<label for="exampleFormControlFile1">Post Image</label>
													<input type="file" name="post_image" value="{{$posts->post_image}}" class="form-control-file" id="exampleFormControlFile1">
												</div>
             <div class="form-group">
                    <img src="{{asset($posts->post_image)}}" style="width:400px; height:200px">
                   </div>
												<div class="form-footer pt-4 pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-success btn-default">Update</button>
												
												</div>
											</form>
										</div>
									</div>

									

								
								</div>
         @endsection

         