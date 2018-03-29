<!DOCTYPE html>
<html>
<head>
    <title>Blank template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="{{ asset('public/assets/img/logo.png') }}" type="image/png" sizes="25x25">
 <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
 <link rel="stylesheet" href="{{ asset('public/bower_components/font-awesome/css/font-awesome.min.css') }}">
 <link rel="stylesheet" href="{{ asset('public/bower_components/alertify/themes/alertify.default.css') }}">
 <link rel="stylesheet" href="{{ asset('public/assets/css/login.css') }}">
</head>
<body>
<div id="wrapper">
        <header>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="logo_left"><img src="{{ asset('public/assets/img/logo.png') }}" class="img-responsive"></div>
                    </div>
                </div>
            </div>
        </header>
        <section class="form_right">
            <div class="container-fluid">
              @include('general_partials.error_section')
                <div class="row">
                    <div class="col-md-8">
                        <div class="login_image"><img src="{{ asset('public/assets/img/login_image.png') }}" class="img-responsive"></div>
                    </div>
                    <div class="col-md-3">
                        <h1 class="signup">Register Here!</h1>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @include('general_partials.error_section')

                        <form id="signin_form" action="{{ route('register_post') }}" method="post">

                          <div class="form-group_form">
                              <label for="UserRole">I am a</label>
                              <div>
                                <label>
                                  <input type="radio" value="2" name="role_id" checked>
                                  Candidate
                                </label>
                                <label>
                                  <input type="radio" value="3" name="role_id" >
                                  Recruiter
                                </label>
                              </div>
                              <br>
                              <!-- <div class="input-group input-group-md col-md-12">
                                <select class="form-control " name="role_id"  id="UserRole" >
                                    <option value="2">Candidate</option>
                                    <option value="3">Employee</option>
                                </select>
                              </div> -->
                          </div>
                            <!-- <div class="form-group">
                              <label for="username">Name:</label>
                              <div class="input-group input-group-md">
                                <input type="text" class="form-control  name" name="name" id="username" value="{{ old('name') }}" placeholder="Name"><span class="input-group-addon" id="usericons"><i class="fa fa-user"></i></span>
                              </div>
                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" class="form-control  name " value="{{ old('name') }}" name="name" id="exampleInputName">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div> -->

                            <div class="form-group">
                              <label for="useremail">Email:</label>
                              <div class="input-group input-group-md">
                                <input type="text" class="form-control  email" name="email" id="useremail" value="{{ old('email') }}" placeholder="Email"><span class="input-group-addon" id="usericons"><i class="fa fa-envelope"></i></span>
                              </div>
                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                            </div>
                            <!-- <div class="form-group_form">
                                <label for="exampleInputemail">EMAIL ADDRESS</label>
                                <input type="email" class="form-control  email" name="email" value="{{ old('email') }}"  id="exampleInputemail">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div> -->
                            <div class="form-group" id="phone_no_div" style="display:none">
                                <label for="phone_no">Contact Number:</label>
                                <div class="input-group input-group-md">
                                    <input type="text" name="phone_no" class="form-control " id="phone_no" placeholder="Phone number" disabled="">  <span  class = "input-group-addon" id="usericons" ><i class = "fa fa-user"></i></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="userpassword">Password:</label>
                                <div class="input-group input-group-md">
                                    <input type="password" name="password" class="form-control " id="userpassword" placeholder="Password">  <span  class = "input-group-addon" id="usericons" ><i class = "fa fa-key "></i></span>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- <div class="form-group_form">
                                <label for="exampleInputPassword1">PASSWORD</label>
                                <input type="password" class="form-control " name="password"  id="exampleInputPassword1">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div> -->

                            <div class="form-group" id="userrepeatpassword_div">
                                <label for="userrepeatpassword">Retype Password:</label>
                                <div class="input-group input-group-md">
                                    <input type="password" name="password_confirmation" class="form-control " id="userrepeatpassword" placeholder="Retype Password">  <span  class = "input-group-addon" id="usericons" ><i class = "fa fa-key "></i></span>
                                </div>
                            </div>

                            <!-- <div class="form-group_form">
                                <label for="exampleInputPassword2">REPEAT PASSWORD</label>
                                <input type="password" class="form-control " name="password_confirmation"  id="exampleInputPassword2">
                            </div> -->
                            <div class="form-group" id="socialmedia_div" style="display:none">
                              <label for="email">How did you hear about us?:</label>
                              <div class="row">
                                <label class="col-md-6">
                                  <input type="radio" value="1" checked="" name="social" disabled=""> LinkedIn
                                </label>
                                <label class="col-md-6">
                                  <input type="radio" value="2" name="social" disabled=""> Twitter
                                </label>
                                <label class="col-md-6">
                                  <input type="radio" value="3" name="social" disabled=""> Google Search
                                </label>
                                <label class="col-md-6">
                                  <input type="radio" value="4" name="social" disabled=""> Others
                                </label>
                              </div>
                            </div>
                            <div class="form-group" role="group" aria-label="...">
                                <div class="button_signin">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <footer class="last_footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="nav_footer">

                            <ul>
                                <li>
                                    <a href="#">© 2015 Talento.</a>
                                </li>
                                <li>
                                    <a href="#">Terms</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                                <li>
                                    <a href="#">About</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
    </div>

<script src="{{asset('public/admin_assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('public/assets/bower_components/jquery/dist/jQuery.min.js') }}"></script>
<script src="{{ asset('public/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/bower_components/alertify/alertify.min.js') }}"></script>
<script src="{{ asset('public/assets/js/custom.js') }}"></script>

</body>
</html>
