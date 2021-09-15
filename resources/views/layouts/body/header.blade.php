
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html"><span>Quick</span>Business</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
     {{-- <a href="index.html" class="logo mr-auto"><img src="{{asset('frontend/assets/img/logo.png')}}" alt="" class="img-fluid"></a> --}}

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{url('/')}}">Home</a></li>

          <li><a href="{{url('/')}}">About</a></li>
          {{-- <li class="drop-down"><a href="">About</a></li> --}}
            {{-- <ul>
              <li><a href="about.html">About Us</a></li>
              <li><a href="team.html">Team</a></li>

            </ul> --}}
          {{-- </li> --}}

          <li><a href="{{route('servicePage')}}">Services</a></li>
          {{-- <li><a href="portfolio.html">Portfolio</a></li>
          <li><a href="pricing.html">Pricing</a></li> --}}
          <li><a href="{{route('blogPage')}}">Blog</a></li>
          <li><a href="{{route('contactPage')}}">Contact</a></li>
          <li><a href="{{route('login')}}">LogIn</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <div class="header-social-links">
        {{-- <a href="#" class="twitter"><i class="icofont-twitter"></i></a> --}}
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
       
      </div>

    </div>
  </header><!-- End Header -->