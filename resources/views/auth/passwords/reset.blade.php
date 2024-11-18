@section('title', 'Reset Password')
@section('layout_css')
<link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/pages/settings.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/pages/auth.css') }}"/>
@stop
<!DOCTYPE html>
<html>
   <head>
      @include('layouts.Admin._includes._head')
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
                      <h5>Send Email</h5>
                    </div>
                    <div class="card-body">
                      <div class="sub-section col-md-12">
                          <div class="sub-section-body">
                          @if (session('status'))
                              <div class="alert alert-success">
                                  {{ session('status') }}
                              </div>
                          @endif
                            <form  method="POST" action="{{ route('password.request') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="user-details-form">
                                  <div class="form-row">
                                    <div class="col-lg-12">
                                        <div class="form-group has-feedback">
                                            <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="E-mail" name="email" value="{{ old('email') }}" autofocus required="" AUTOCOMPLETE='off'>
                                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                            @if ($errors->has('email'))
                                                <br/>
                                                <span class="invalid-feedback">
                                                    <strong><p class="text-red">{{ $errors->first('email') }}</p></strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group has-feedback">
                                            <input id="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" name="password" value="{{ old('password') }}" autofocus required="" AUTOCOMPLETE='off'>
                                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <input id="confirm-password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Confirm password" name="password_confirmation" value="{{ old('password_confirmation') }}" autofocus required="" AUTOCOMPLETE='off'>
                                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                            @if ($errors->has('password'))
                                                <br/>
                                                <span class="invalid-feedback">
                                                    <strong><p class="text-red">{{ $errors->first('password') }}</p></strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-dark-red-f-gr mt-4 pull-center">Reset Password</button>
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
