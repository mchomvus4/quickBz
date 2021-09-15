 <aside class="left-sidebar bg-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="{{route('dashboard')}}">
               
                <span class="brand-name">Qiuck Dashboard</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">

              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
  
                  <li  class="has-sub active expand" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                      aria-expanded="false" aria-controls="dashboard">
                      <i class="mdi mdi-view-dashboard-outline"></i>
                      <span class="nav-text">Home</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse show"  id="dashboard"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li  class="active" >
                              <a class="sidenav-item-link" href="{{route('slider')}}">
                                <span class="nav-text">Slider</span>
                                
                              </a>
                            </li>
                          
                            <li  class="active" >
                              <a class="sidenav-item-link" href="{{route('about')}}">
                                <span class="nav-text">About</span>
                                
                              </a>
                            </li>
                          
                            {{-- <li  class="active" >
                              <a class="sidenav-item-link" href="index.html">
                                <span class="nav-text">Portfolio</span>
                                
                              </a>
                            </li> --}}
                          
                            <li  class="active" >
                              <a class="sidenav-item-link" href="{{route('brand')}}">
                                <span class="nav-text">Brand</span>
                                
                              </a>
                            </li>
                            <li  class="active" >
                              <a class="sidenav-item-link" href="{{route('blog')}}">
                                <span class="nav-text">Blog</span>
                                
                              </a>
                            </li>
                            <li  class="active" >
                              <a class="sidenav-item-link" href="{{route('service')}}">
                                <span class="nav-text">Service</span>
                                
                              </a>
                            </li>
                            {{-- <li  class="active" >
                              <a class="sidenav-item-link" href="{{route('register')}}">
                                <span class="nav-text">Create User</span>
                                
                              </a>
                            </li> --}}
                          
  
                      </div>
                    </ul>
                  </li>

                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-elements"
                      aria-expanded="false" aria-controls="ui-elements">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Contact Page</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="ui-elements"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                          <li  class="active" >
                              <a class="sidenav-item-link" href="{{route('contact')}}">
                                <span class="nav-text">Contact Profile</span>
                                
                              </a>
                            </li>
                              <li  class="active" >
                              <a class="sidenav-item-link" href="{{route('message')}}">
                                <span class="nav-text">Contact Message</span>
                                
                              </a>
                            </li>
                              <li  class="active" >
                              <a class="sidenav-item-link" href="{{route('emailAddress')}}">
                                <span class="nav-text">Customer Emails</span>
                                
                              </a>
                            </li>

                      </div>
                    </ul>
                  </li>
                

                
              </ul>

            </div>

            <hr class="separator" />

           
          </div>
        </aside>