<footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Company</h3>
            <p>
              Plot No. 55 Block B <br>
              Nera Street Nyamagana<br>
              Mwanza - Tanzania<br><br>
              <strong>Phone:</strong> +255 768 205 514<br>
              <strong>Email:</strong> info@quickBz.co.tz<br>
            </p>
          </div>

          {{-- <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div> --}}

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Legal Issues</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Business Name Registration</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Company Registration</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing Skills</a></li>
              
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
             @if(session('success'))
            <div class="alert alert-success alert-fade show" role="alert">
              <strong>{{session('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            <h4>Join Our Newsletter</h4>
            <p>Use The Form Below By sendind Us Your Email Address For Our Monthly New Letter</p>
            <form action="{{route('subscribedUser')}}" method="post">
              @csrf
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>QuickBzReg</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
          Designed by | Samwel Mchomvu | From NOTTECH Lab</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        {{-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> --}}
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        {{-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> --}}
        {{-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> --}}
      </div>
    </div>
  </footer><!-- End Footer -->