<header>
   <div class="container-fluid">
      <div class="row">
         @if(Auth::check())
         <div class="col-md-9">
            <div class="top_left">         
               <ul>
                  <li>
                     <a href="{{route('dashboard')}}">
                     <div class="logo_left"><img src="{{ asset('public/assets/img/logo.png') }}"></div>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('manage_test_view')}}">
                        <div class="list-parent">
                           <div class="list-child">
                              <img src="{{ asset('public/assets/img/icon-edit.png') }}">Manage Tests
                           </div>
                        </div>
                     </a>
                  </li>
                  <li>
                     <a href="{{route('lib_index')}}">
                        <div class="list-parent">
                           <div class="list-child">
                              <img src="{{ asset('public/assets/img/icon-library.png') }}">Library
                           </div>
                        </div>
                     </a>
                  </li>
                  <li class="dropdown">
                     <div>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('public/assets/img/icon-more.png') }}">MoreMenu
                        <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                           <li><a href="{{route('history')}}"><i class="fa fa-clock-o" aria-hidden="true"></i>Assessment History</a></li>
                           <li><a href="{{route('customer_support')}}"><i class="fa fa-headphones"></i>Customer Support</a></li>
                        </ul>
                     </div>
                  </li>
                  <li class="searchbar">
                     <div class="header-search">
                        <div class="icon-addon addon-md">
                           <input type="text" placeholder="Search Help Doc Ex: How To Host Test" class="form-control input-search">
                           <label for="text" class="glyphicon glyphicon-search" rel="tooltip" title="text"></label>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-md-3">
            <div class="top_right">
               <ul>
                  <!--<li><i class="fa fa-bell"></i></li>-->
                  <li class="dropdown">
                     <div>
                        <button class="dropdown-toggle profileDropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fa fa-bell"></i>
                        <span class="caret icon_bell"></span>
                        </button>
                        <ul class="dropdown-menu right_menu bg_icon" aria-labelledby="dropdownMenu1">
                           <li>
                              <a href="#">
                                 <img src="{{ asset('public/assets/img/credits_db.png') }}" class="img-responsive db_img"></i>
                                 <p class="free_credit">Get 5 free credits, help us <br>improve COdeGround, click here</p>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </li>
                  <li><a href="{{route('setting_info')}}"><i class="fa fa-info-circle"></i></a></li>
                  <li class="dropdown">
                     <div>
                        <button class="dropdown-toggle profileDropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                       
                        {{Auth::user()->name}}
                        <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu right_menu" aria-labelledby="dropdownMenu1">
                           <li><a href="{{route('general_setting')}}">Settings</a></li>
                           <li><a href="{{route('change_password')}}">Change Password</a></li>
                           <li><a href="{{route('logout_function')}}">Logout</a></li>
                        </ul>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
         @endif
      </div>
   </div>
</header>