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
                      <h5>Sign in to start your session</h5>
                    </div>
                    <div class="card-body">
                      <div class="sub-section col-md-12">
                          <div class="sub-section-body">
                            <form method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="user-details-form">
                                  <div class="form-row">
                                    <div class="col-lg-12">
                                        <div class="form-group has-feedback">
                                            <input id="email" type="email" class="form-control {{ $errors->has('email') || $errors->has('password') ? 'is-invalid' : '' }}" placeholder="E-mail" name="email" value="{{ old('email') }}" autofocus required="" AUTOCOMPLETE='off'>
                                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group has-feedback">
                                            <input id="password" type="password" class="form-control {{ $errors->has('email') || $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" name="password" required="" AUTOCOMPLETE='off'>
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                            @if ($errors->has('email'))
                                                <br/>
                                                <span class="invalid-feedback">
                                                    <strong><p class="text-red">{{ $errors->first('email') }}</p></strong>
                                                </span>
                                            @endif
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="checkbox icheck">
                                            <label>
                                            <input name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}> Remember me
                                            </label>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-dark-red-f-gr mt-4 pull-center">Login</button>
                                    <a href="{{route('register')}}" class="btn btn-block btn-dark-blue-f mt-2 pull-center">Register</a>
                                    <div class="col-xs-12 mt-2 text-center">                            
                                       <a href="{{ route('password.request') }}">Forgot password?</a>                                     
                                    </div>
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
