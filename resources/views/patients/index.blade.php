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
       <link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/pages/patients.css') }}"/>
      <script src="{{ asset('assets/SiteAssets/js/patients.js') }}"></script>
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
               <div class="aob-items">
                  <div class="card">
                     <div class="card-header">
                        <img src="{{ asset('assets/SiteAssets/images/covid-19.svg') }}"/>
                    </div>
                     <div class="card-body">
                        <p><u><i class="las la-globe"></i>world</u></p>
                        <p>infected -<u>43,341,451</u></p>
                        <p>deaths -<u>1,157,509</u></p>
                     </div>
                     <div class="card-footer"><a class="btn btn-dark-red-f-gr btn-sm" href="https://covid19.who.int" target="_blank">view COVID-19 info</a></div>
                  </div>
               </div>
            </ul>
         </div>
         <div class="main-content">
            <div class="container-fluid">
               <div class="section title-section">
                  <h5 class="page-title"></h5>
               </div>
               <div class="section filters-section">
                  <div class="dropdowns-wrapper">
                     <div class="dropdown">
                        <a class="btn btn-dark-red-o dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">filter</a>
                        <div class="dropdown-menu shadow-lg" aria-labelledby="dropdownMenuLink"><a class="dropdown-item" href="#">age</a><a class="dropdown-item" href="#">diagnosis</a><a class="dropdown-item" href="#">triage</a></div>
                     </div>
                     <div class="dropdown">
                        <a class="btn btn-dark-red-o dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">sort by</a>
                        <div class="dropdown-menu shadow-lg" aria-labelledby="dropdownMenuLink"><a class="dropdown-item" href="#">patient id</a><a class="dropdown-item" href="#">patient name</a><a class="dropdown-item" href="#">age</a><a class="dropdown-item" href="#">date of birth</a><a class="dropdown-item" href="#">diagnosis</a><a class="dropdown-item" href="#">triage</a></div>
                     </div>
                  </div>
                  <div class="switch-view-btns">
                     <div class="btn-group btn-group-toggle" data-toggle="buttons"><label class="btn btn-darker-grey-o active"><input id="card-view-btn" type="radio" name="options" checked=""/><i class="las la-th-large"></i></label><label class="btn btn-darker-grey-o"><input id="table-view-btn" type="radio" name="options"/><i class="las la-list-ul"></i></label></div>
                  </div>
                  <div class="buttons-wrapper ml-auto">
                     <a href="{{ route('patient.create') }}" class="btn btn-dark-red-f-gr">
                        <i class="las la-plus-circle"></i>add a new patient
                     </a>
                  </div>
               </div>
               <div class="section patients-card-view">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="card">
                           <div class="card-header">
                              <div class="card-img-top"><img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/people.svg') }}" loading="lazy"/><a class="view-more" href="details.html">view profile</a></div>
                           </div>
                           <div class="card-body">
                              <div class="card-subsection-title">
                                 <h5>john doe</h5>
                                 <p class="text-muted">patient-id: 2189178</p>
                              </div>
                              <div class="card-subsection-body">
                                 <label class="text-muted">age</label>
                                 <p>29</p>
                                 <label class="text-muted">date of birth</label>
                                 <p>21/12/1993</p>
                                 <label class="text-muted">diagnosis</label>
                                 <p>urgent</p>
                              </div>
                           </div>
                           <div class="card-footer"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="section patients-table-view no-display">
                  <table class="table table-hover table-responsive-lg">
                     <thead>
                        <tr>
                           <th>patient ID</th>
                           <th>patient name</th>
                           <th>E-mail</th>
                           <th>age</th>
                           <th>gender</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($patients as $patient)
									@if (!empty($patient))
                           <tr>
                              <td>{{ $patient['id'] }}</td>
                              <td><img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/people.svg') }}" loading="lazy"/><span class="ml-2">{{ $patient['first_name']. ' ' .$patient['last_name'] }}</span></td>
                              <td>{{ $patient['email'] }}</td>
                              <td>{{ $patient['age'] }} yo</td>
                              <td>{{ $patient['gender'] }}</td>
                              <td>
                                 <a class="btn btn-default  btn-xs" href="{{ route('patient.show', $patient->id) }}" title="View"><i class="la la-eye"></i></a>
                                 <a class="btn btn-warning  btn-xs" href="{{ route('patient.edit', $patient->id) }}" title="Edit"><i class="la la-pencil"></i></a> 
                                 <a class="btn btn-danger  btn-xs" href="#" title="Delete" data-toggle="modal" data-target="#modal-delete-{{ $patient->id }}"><i class="la la-trash"></i></a>
                              </td>
                           </tr>
                           @endif
								@endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </main>
   </body>
</html>
