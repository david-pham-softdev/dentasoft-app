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
      <link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/vendors/Chart.min.css') }}"/>
      <script src="{{ asset('assets/SiteAssets/js/vendors/Chart.bundle.min.js') }}"></script>
        <!-- <script src="{{ asset('assets/SiteAssets/js/dashboard.js') }}"></script> -->
       <link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/pages/settings.css') }}"/>
   </head>
   <body>
      <header>
         <nav class="navbar navbar-expand-lg shadow-sm fixed-top">
            <a class="navbar-brand" href=""><img src="{{ asset('assets/SiteAssets/images/hospital-website.svg') }}"/><span>Dentasoft</span></a>
            <div class="navbar-collapse">
               <ul class="navbar-nav">
                  <li class="nav-item"><a class="nav-link"><i class="las la-question-circle"></i></a></li>
                  <li class="nav-item dropdown dropleft">
                     <a class="nav-link notification-dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-pill badge-primary" style="float:right;margin-bottom:-10px;"></span><i class="las la-bell"></i></a>
                     <div class="dropdown-menu notification-dropdown-menu shadow-lg" aria-labelledby="notification-dropdown">
                        <div class="dropdown-title"><a href="">notifications<span class="ml-2 notifications-count">(3)</span></a><a class="float-right" href="">mark all as read</a></div>
                        <div class="dropdown-body">
                           <ul class="list-unstyled">
                              <li class="media">
                                 <a class="notification-card" href="">
                                    <img class="mr-3" src="{{ asset('assets/SiteAssets/images/inbox.svg') }}" alt="..."/>
                                    <div class="media-body">
                                       <h6 class="mt-0 mb-1">collaboration tools available</h6>
                                       <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                       <small class="text-muted">21.03.2020, 13.02</small>
                                    </div>
                                 </a>
                              </li>
                              <li class="media">
                                 <a class="notification-card" href="">
                                    <img class="mr-3" src="{{ asset('assets/SiteAssets/images/inbox.svg') }}" alt="..."/>
                                    <div class="media-body">
                                       <h6 class="mt-0 mb-1">use the new app launcher</h6>
                                       <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                       <small class="text-muted">21.03.2020, 13.02</small>
                                    </div>
                                 </a>
                              </li>
                              <li class="media">
                                 <a class="notification-card" href="">
                                    <img class="mr-3" src="{{ asset('assets/SiteAssets/images/inbox.svg') }}" alt="..."/>
                                    <div class="media-body">
                                       <h6 class="mt-0 mb-1">the new dashboard abailable</h6>
                                       <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                       <small class="text-muted">21.03.2020, 13.02</small>
                                    </div>
                                 </a>
                              </li>
                           </ul>
                        </div>
                        <div class="dropdown-footer text-center"><a href="notifications.html">view more</a></div>
                     </div>
                  </li>
                  <li class="nav-item">
                     <div class="nav-link"><span class="vertical-divider"></span></div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link profile-dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/person.jpg') }}"/><span class="d">jane doe</span></a>
                     <div class="dropdown">
                        <div class="dropdown-menu shadow-lg profile-dropdown-menu" aria-labelledby="profile-dropdown">
                           <a class="dropdown-item" href="#"><i class="las la-user mr-2"></i>profile</a>
                           <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="las la-cog mr-2"></i>Logout</a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                           </form>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <main>
         <div class="side-nav">
            <ul class="list-group list-group-flush">
               <a class="list-group-item" href="/" data-toggle="tooltip" data-placement="bottom" title="Dashboard"><i class="las la-shapes la-lw"></i><span>dashboard</span></a>
               <a class="list-group-item active" href="/patient" data-toggle="tooltip" data-placement="bottom" title="Patients"><i class="las la-user-injured la-lw"></i><span>patients</span></a>
               <hr class="divider"/>
            </ul>
         </div>
         <div class="main-content">
            <div class="container-fluid">
               <div class="section">
                  <h5 class="page-title">Patient</h5>
               </div>
               <div class="section profile-section">
                  <div class="card container">
                     <div class="card-header">
                        <h5>Create Patient</h5>
                     </div>
                     <div class="card-body">
                        <div class="sub-section col-md-12">
                           <div class="sub-section-body">
                              <form action="{{ route('patient.store') }}" method="post">
                                 {{ csrf_field() }}
                                 <div class="user-details-form">
                                    <div class="form-row">
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label for="nome">First Name</label>
                                             <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" placeholder="First Name" required="" value="{{ old('first_name') }}">
                                             @if($errors->has('first_name'))
                                                <span class="invalid-feedback">
                                                   <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label for="nome">Last Name</label>
                                             <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" placeholder="Last Name" required="" value="{{ old('last_name') }}">
                                             @if($errors->has('last_name'))
                                                <span class="invalid-feedback">
                                                   <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label for="nome">Email address</label>
                                             <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email address" required="" value="{{ old('email') }}">
                                             @if($errors->has('email'))
                                                <span class="invalid-feedback">
                                                   <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="form-group">
                                             <label for="nome">Age</label>
                                             <input type="number" name="age" class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" placeholder="Age" required="" value="{{ old('age') }}">
                                             @if($errors->has('age'))
                                                <span class="invalid-feedback">
                                                   <strong>{{ $errors->first('age') }}</strong>
                                                </span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="form-group col-lg-6">
                                          <label for="nome">Gender</label>
                                          <select name="gender" class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" data-placeholder="Gender" required="">
                                             <option value=""> Select </option>
                                             <option value="female"> Female </option>
                                             <option value="male"> Male </option>
                                          </select>
                                          @if($errors->has('gender'))
                                             <span class="invalid-feedback">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                             </span>
                                          @endif
                                    </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark-red-f-gr mt-4 pull-right">
                                       <i class="las la-plus"></i> Add
                                    </button>
                                 </div>
                              </form>
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
