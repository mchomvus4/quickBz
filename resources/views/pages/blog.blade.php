
 <style>
   .entry-content{
     text-align: justify;
   }
   .blog_title{
     margin-left: .8rem;
   }
 </style>
 
 @extends('layouts.master_home')

@section('home_content')

 <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
@if(session('success'))
            <div class="alert alert-success alert-fade show" role="alert">
              <strong>{{session('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">
            @foreach ($blogspost as $blog)
              
           
            <article class="entry" data-aos="fade-up">

              <div class="entry-img">
                <img src="{{$blog->post_image}}" alt="" style="width: 1024px; height:400px" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{url('blogPage')}}">{{$blog->title}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  {{-- <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">John Doe</a></li> --}}
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="{{url('blogPage')}}"><time datetime="2020-01-01">{{$blog->created_at->diffForHumans()}}</time></a></li>
                 
                </ul>
              </div>

              <div class="entry-content">
                <p>{{$blog->post_content}} </p>
                <div class="read-more">
                  <a href="{{url('blogPage')}}">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
             @endforeach
          

          

           

            {{-- <div class="blog-pagination">
              <ul class="justify-content-center">
                <li class="disabled"><i class="icofont-rounded-left"></i></li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
              </ul>
            </div> --}}

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar" data-aos="fade-left">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div><!-- End sidebar search formn-->
{{-- 
              <h3 class="sidebar-title">Posts</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="#">General <span>(25)</span></a></li>
                  <li><a href="#">Lifestyle <span>(12)</span></a></li>
                  <li><a href="#">Travel <span>(5)</span></a></li>
                  <li><a href="#">Design <span>(22)</span></a></li>
                  <li><a href="#">Creative <span>(8)</span></a></li>
                  <li><a href="#">Educaion <span>(14)</span></a></li>
                </ul>

              </div> --}}
              <!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              @foreach ($blogspost as $blog)
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="{{$blog->post_image}}" alt="" style="width: 100px; height:70px" >
                  <h4><a href="{{url('blogPage')}}" class="blog_title">{{$blog->title}}</a></h4>
                  <time datetime="2020-01-01">{{$blog->created_at->diffForHumans()}}</time>
                </div>

      
              </div><!-- End sidebar recent posts-->
              @endforeach
            

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

