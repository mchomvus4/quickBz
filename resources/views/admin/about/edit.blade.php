
  @extends('admin.admin_master')
         
         @section('admin')

<div class="col-lg-12">
									<div class="card card-default">
           
										<div class="card-header card-header-border-bottom">
											<h2>Update About Content </h2>
										</div>
										<div class="card-body">
										 <form action="{{url('updateAbout/'.$abouts->id)}}" method="POST">
            @csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">About Title</label>
													<input type="text" name="title" value="{{$abouts->title}}" class="form-control" id="exampleFormControlInput1" placeholder="About Title">
												
												</div>
											
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Short Description</label>
													<textarea class="form-control" name="short_dis" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Short Discription">{{$abouts->short_dis}}</textarea>
             
												</div>
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Long Description</label>
													<textarea class="form-control" name="long_dis" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Long Discription">{{$abouts->long_dis}}</textarea>
             
												</div>
											
												<div class="form-footer pt-4 pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-success">Update Content</button>
												
												</div>
											</form>
										</div>
									</div>

					
								
								</div>
         @endsection