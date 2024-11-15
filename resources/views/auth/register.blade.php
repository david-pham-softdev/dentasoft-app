<html>
   <head>
      <title>Admin</title>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/vendors/bootstrap.min.css') }}"/>
      <link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/vendors/line-awesome.min.css') }}"/>
      <link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/pages/layout.css') }}"/>
      <link rel="icon" href="{{ asset('assets/SiteAssets/images/covid-19.ico') }}"/>
      <script src="{{ asset('assets/SiteAssets/js/vendors/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/SiteAssets/js/vendors/bootstrap.bundle.min.js') }}"></script>
       <script src="{{ asset('assets/SiteAssets/js/global.js') }}"></script>
      <link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/pages/dashboard.css') }}"/>
       <link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/pages/settings.css') }}"/>
       <link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/pages/auth.css') }}"/>
   </head>
   <body>
      <header>
         <nav class="navbar navbar-expand-lg shadow-sm fixed-top">
            <a class="navbar-brand" href=""><img src="{{ asset('assets/SiteAssets/images/hospital-website.svg') }}"/><span>Dentasoft</span></a>
            <div class="navbar-collapse">
               <ul class="navbar-nav">
                  <li class="nav-item"><a href="{{route('login')}}"class="nav-link">Login</a></li>
                  <li class="nav-item">
                     <div class="nav-link"><span class="vertical-divider"></span></div>
                  </li>
                  <li class="nav-item"><a href="{{route('register')}}" class="nav-link">Register</a></li>
               </ul>
            </div>
         </nav>
      </header>
      <main>
         <div class="main-content-auth">
            <div class="container-fluid">
               <div class="section profile-section">
                <div class="container wrap-card">
                  <div class="card col-lg-6">
                    <div class="card-header">
                      <h5>Register a new membership</h5>
                    </div>
                    <div class="card-body">
                      <div class="sub-section col-md-12">
                          <div class="sub-section-body">
                            <form method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <div class="user-details-form">
                                  <div class="form-row">
                                      <div class="col-lg-12">
                                        <div class="form-group">
                                          <input id="company" type="text" class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" placeholder="Company" name="company" value="{{ old('company') }}" required="" AUTOCOMPLETE='off'>
                                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                          @if ($errors->has('company'))
                                              <br/>
                                              <span class="invalid-feedback">
                                                  <strong><p class="text-red">{{ $errors->first('company') }}</p></strong>
                                              </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="form-group">
                                          <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="E-mail" name="email" value="{{ old('email') }}" required="" AUTOCOMPLETE='off'>
                                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                          @if ($errors->has('email'))
                                              <br/>
                                              <span class="invalid-feedback">
                                                  <strong><p class="text-red">{{ $errors->first('email') }}</p></strong>
                                              </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" placeholder="First Name" required="" value="{{ old('first_name') }}">
                                            @if($errors->has('first_name'))
                                              <span class="invalid-feedback">
                                                  <strong>{{ $errors->first('first_name') }}</strong>
                                              </span>
                                            @endif
                                        </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" placeholder="Last Name" required="" value="{{ old('last_name') }}">
                                            @if($errors->has('last_name'))
                                              <span class="invalid-feedback">
                                                  <strong>{{ $errors->first('last_name') }}</strong>
                                              </span>
                                            @endif
                                        </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="tel" name="phone_number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" placeholder="Mobile Number" required="" value="{{ old('phone_number') }}">
                                            @if($errors->has('phone_number'))
                                              <span class="invalid-feedback">
                                                  <strong>{{ $errors->first('phone_number') }}</strong>
                                              </span>
                                            @endif
                                        </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="form-group">
                                          <input id="password" type="password" class="form-control" placeholder="Password" name="password" required="" AUTOCOMPLETE='off'>
                                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="confirm-password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Confirm Password" name="password_confirmation" required="" AUTOCOMPLETE='off'>
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong><p class="text-red">{{ $errors->first('password') }}</p></strong>
                                                </span>
                                            @endif
                                        </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="form-group">
                                          <input id="code_elab" type="text" class="form-control {{ $errors->has('code_elab') ? 'is-invalid' : '' }}" placeholder="Code Elab" name="code_elab" value="{{ old('code_elab') }}" autofocus required="" AUTOCOMPLETE='off'>
                                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                          @if ($errors->has('code_elab'))
                                              <span class="invalid-feedback">
                                                  <strong><p class="text-red">{{ $errors->first('code_elab') }}</p></strong>
                                              </span>
                                          @endif
                                      </div>
                                    </div>
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                          <!-- <label for="nome">Client Type</label> -->
                                          <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" data-placeholder="Client Type" required="">
                                              <option value=""> Select </option>
                                              <option value="Dentist"> Dentist </option>
                                              <option value="Lab"> Laboratoire </option>
                                          </select>
                                          @if($errors->has('role'))
                                              <span class="invalid-feedback">
                                                  <strong>{{ $errors->first('role') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-dark-red-f-gr mt-4 pull-center">Register</button>
                                    <a href="{{route('login')}}" class="btn btn-block btn-dark-blue-f mt-4 pull-center">Login</a>
                                  </div> 
                                </div>
                            </form>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                  
               </div>
            </div>
            <footer>
               <div class="page-footer text-center">
                  <div class="fixed-bottom shadow-sm">
                  <a href="https://covid19.who.int" target="_blank">
                     <img src="../SiteAssets/images/covid-19.svg" />
                     <span>view COVID-19 info</span>
                  </a>
                  </div>
               </div>
            </footer>
         </div>
      </main>
   </body>
</html>
