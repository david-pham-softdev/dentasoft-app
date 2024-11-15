@extends('layouts.Admin.index')
@section('title')Dashboard
@endsection
@section('layout_css')
   <link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/pages/dashboard.css') }}"/>
   <link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/vendors/Chart.min.css') }}"/>
@endsection
@section('content')
   <div class="main-content">
      <div class="container-fluid">
         <div class="section">
            <div class="row">
               <div class="col-md-6">
                  <h5 class="page-title"></h5>
               </div>
            </div>
         </div>
         <div class="section welcome-section">
            <div class="section-content">
               <div class="card-deck">
                  <div class="card welcome-content-card">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-6 welcome-text-wrapper align-self-center">
                              @if(Auth::user('name'))
                                 <h5>hello, {{ Auth::user()->first_name }}</h5>
                              @endif
                              
                              <p>Welcome to your dashboard</p>
                           </div>
                           <div class="col-md-6 welcome-img-wrapper"><img src="{{ asset('assets/SiteAssets/images/hello.svg') }}"/></div>
                        </div>
                     </div>
                  </div>
                  <div class="card app-stats-card">
                     <div class="card-body">
                        <div class="row text-center">
                           <div class="col-md-4">
                              <i class="las la-user-injured la-3x align-self-center"></i>
                              <p>total patients</p>
                              <h4><a href="">2,301</a></h4>
                           </div>
                           <div class="col-md-4">
                              <i class="las la-user-md la-3x align-self-center"></i>
                              <p>total laboratories</p>
                              <h4><a href="">401</a></h4>
                           </div>
                           <div class="col-md-4">
                              <i class="las la-clinic-medical la-3x align-self-center"></i>
                              <p>total encode works</p>
                              <h4><a href="">21</a></h4>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="section functionality-section">
            <div class="section-content">
               <div class="card-deck">
                  <a class="card text-center" href="" data-toggle="modal" data-target="#modal-add-elab-code">
                     <div class="card-title">
                        <div class="icon-wrapper"><i class="las la-clinic-medical"></i></div>
                     </div>
                     <div class="card-body">
                        <p>add a laboratories</p>
                     </div>
                  </a>
                  <div class="modal fade" id="modal-add-elab-code">
                     <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h4 class="modal-title"><i class="fa fa-plus"></i>Add laboratory by elab code</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">×</span>
                                 </button>
                              </div>
                              
                              <form action="{{ route('elabcode.store') }}" method="post" enctype="multipart/form-data">
                                 {{ csrf_field() }}

                                 <div class="modal-body">
                                       <div class="row">
                                          <div class="col-lg-12">
                                             <div class="form-group">
                                                   <label>Elab code</label>
                                                   <input type="text" name="code_elab" class="form-control"  maxlength="50" placeholder="Elab code" required>
                                             </div>
                                          </div> 
                                       </div>
                                 </div>

                                 <div class="modal-footer">
                                       <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                       <button type="submit" class="btn btn-dark-red-f-gr"><i class="fa fa-plus"></i>Add</button>
                                 </div>

                              </form>  
                           </div>
                     </div>
                  </div>
                  <a class="card text-center" href="{{ route('patient.create') }}">
                     <div class="card-title">
                        <div class="icon-wrapper"><i class="las la-user-md"></i></div>
                     </div>
                     <div class="card-body">
                        <p>add a patients</p>
                     </div>
                  </a>
                  <a class="card text-center" href="">
                     <div class="card-title">
                        <div class="icon-wrapper"><i class="las la-user-plus"></i></div>
                     </div>
                     <div class="card-body">
                        <p>add an encode work</p>
                     </div>
                  </a>
               </div>
            </div>
         </div>
         <div class="section card-summaries">
            <div class="section-content">
               <div class="card-deck">
                  <div class="card">
                     <div class="card-header">
                        <h5>recent activities</h5>
                     </div>
                     <div class="card-body">
                        <canvas id="recent-activity-chart"></canvas>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header">
                        <h5>total bookings</h5>
                     </div>
                     <div class="card-body">
                        <canvas id="bookings-chart"></canvas>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header">
                        <h5>diseases summary</h5>
                     </div>
                     <div class="card-body">
                        <canvas id="diseases-chart"></canvas>
                     </div>
                  </div>
               </div>
               <div class="card-deck">
                  <div class="card">
                     <div class="card-header">
                        <h5>top treatments</h5>
                     </div>
                     <div class="card-body">
                        <ol type="1">
                           <li>consultation</li>
                           <li>scaling</li>
                           <li>root canal</li>
                           <li>bleaching</li>
                           <li>transplants</li>
                           <li>cesarean</li>
                           <li>x-rays</li>
                        </ol>
                     </div>
                     <div class="card-footer"><a class="view-more" href="">more<i class="las la-angle-right"></i></a></div>
                  </div>
                  <div class="card total-counts-summary">
                     <div class="card-header">
                        <h5>total counts</h5>
                     </div>
                     <div class="card-body">
                        <div class="row text-center text-capitalize">
                           <div class="col-md-6">
                              <i class="las la-users la-2x mb-1"></i>
                              <h4 class="mb-1">100</h4>
                              <p>total users</p>
                           </div>
                           <div class="col-md-6">
                              <i class="las la-user-md la-2x mb-1"></i>
                              <h4 class="mb-1">12</h4>
                              <p>total doctors</p>
                           </div>
                           <div class="col-md-6">
                              <i class="las la-user-injured la-2x mb-1"></i>
                              <h4 class="mb-1">3210</h4>
                              <p>total patients</p>
                           </div>
                           <div class="col-md-6">
                              <i class="las la-hospital la-2x mb-1"></i>
                              <h4 class="mb-1">40</h4>
                              <p>total clinics</p>
                           </div>
                        </div>
                     </div>
                     <div class="card-footer"><a class="view-more" href="">more<i class="las la-angle-right"></i></a></div>
                  </div>
                  <div class="card">
                     <div class="card-header">
                        <h5>recent patients</h5>
                     </div>
                     <div class="card-body">
                        <table class="table table-hover table-responsive-md table-borderless">
                           <tbody>
                              <tr>
                                 <td><img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/man.svg') }}" loading="lazy"/></td>
                                 <td>
                                    <p>john doe</p>
                                    <small class="text-muted">dentist</small>
                                 </td>
                                 <td>
                                    <p class="text-muted">male</p>
                                 </td>
                                 <td><button class="btn btn-sm"><i class="las la-ellipsis-h"></i></button></td>
                              </tr>
                              <tr>
                                 <td><img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/man.svg') }}" loading="lazy"/></td>
                                 <td>
                                    <p>john doe</p>
                                    <small class="text-muted">dentist</small>
                                 </td>
                                 <td>
                                    <p class="text-muted">male</p>
                                 </td>
                                 <td><button class="btn btn-sm"><i class="las la-ellipsis-h"></i></button></td>
                              </tr>
                              <tr>
                                 <td><img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/man.svg') }}" loading="lazy"/></td>
                                 <td>
                                    <p>john doe</p>
                                    <small class="text-muted">dentist</small>
                                 </td>
                                 <td>
                                    <p class="text-muted">male</p>
                                 </td>
                                 <td><button class="btn btn-sm"><i class="las la-ellipsis-h"></i></button></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="card-footer"><a class="view-more" href="">more<i class="las la-angle-right"></i></a></div>
                  </div>
               </div>
               <div class="card-deck">
                  <div class="card">
                     <div class="card-header">
                        <h5>doctors lists</h5>
                     </div>
                     <div class="card-body">
                        <table class="table table-borderless table-hover table-responsive-md">
                           <tbody>
                              <tr>
                                 <td><img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/man.svg') }}" loading="lazy"/></td>
                                 <td>
                                    <p>john doe</p>
                                    <small class="text-muted">dentist</small>
                                 </td>
                                 <td>
                                    <p class="text-muted">male</p>
                                 </td>
                                 <td class="text-right">
                                    <p>+271289178</p>
                                 </td>
                                 <td class="text-right"><button class="btn btn-dark-red-f btn-sm">appointment</button></td>
                                 <td><button class="btn btn-sm"><i class="las la-ellipsis-h"></i></button></td>
                              </tr>
                              <tr>
                                 <td><img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/man.svg') }}" loading="lazy"/></td>
                                 <td>
                                    <p>john doe</p>
                                    <small class="text-muted">dentist</small>
                                 </td>
                                 <td>
                                    <p class="text-muted">male</p>
                                 </td>
                                 <td class="text-right">
                                    <p>+271289178</p>
                                 </td>
                                 <td class="text-right"><button class="btn btn-dark-red-f btn-sm">appointment</button></td>
                                 <td><button class="btn btn-sm"><i class="las la-ellipsis-h"></i></button></td>
                              </tr>
                              <tr>
                                 <td><img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/man.svg') }}" loading="lazy"/></td>
                                 <td>
                                    <p>john doe</p>
                                    <small class="text-muted">dentist</small>
                                 </td>
                                 <td>
                                    <p class="text-muted">male</p>
                                 </td>
                                 <td class="text-right">
                                    <p>+271289178</p>
                                 </td>
                                 <td class="text-right"><button class="btn btn-dark-red-f btn-sm">appointment</button></td>
                                 <td><button class="btn btn-sm"><i class="las la-ellipsis-h"></i></button></td>
                              </tr>
                              <tr>
                                 <td><img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/man.svg') }}" loading="lazy"/></td>
                                 <td>
                                    <p>john doe</p>
                                    <small class="text-muted">dentist</small>
                                 </td>
                                 <td>
                                    <p class="text-muted">male</p>
                                 </td>
                                 <td class="text-right">
                                    <p>+271289178</p>
                                 </td>
                                 <td class="text-right"><button class="btn btn-dark-red-f btn-sm">appointment</button></td>
                                 <td><button class="btn btn-sm"><i class="las la-ellipsis-h"></i></button></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="card-footer"><a class="view-more" href="">more<i class="las la-angle-right"></i></a></div>
                  </div>
                  <div class="card">
                     <div class="card-header">
                        <h5>upcoming appointments</h5>
                     </div>
                     <div class="card-body">
                        <table class="table table-borderless table-hover table-responsive-md">
                           <tbody>
                              <tr>
                                 <td><img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/man.svg') }}" loading="lazy"/></td>
                                 <td>
                                    <p>john doe</p>
                                    <small class="text-muted">dentist</small>
                                 </td>
                                 <td>
                                    <p class="text-muted">male</p>
                                 </td>
                                 <td class="text-right">
                                    <p>24y</p>
                                 </td>
                                 <td class="text-right"><button class="btn"><i class="las la-check-circle"></i></button><button class="btn"><i class="las la-times-circle"></i></button></td>
                                 <td><button class="btn btn-sm"><i class="las la-ellipsis-h"></i></button></td>
                              </tr>
                              <tr>
                                 <td><img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/man.svg') }}" loading="lazy"/></td>
                                 <td>
                                    <p>john doe</p>
                                    <small class="text-muted">dentist</small>
                                 </td>
                                 <td>
                                    <p class="text-muted">male</p>
                                 </td>
                                 <td class="text-right">
                                    <p>24y</p>
                                 </td>
                                 <td class="text-right"><button class="btn"><i class="las la-check-circle"></i></button><button class="btn"><i class="las la-times-circle"></i></button></td>
                                 <td><button class="btn btn-sm"><i class="las la-ellipsis-h"></i></button></td>
                              </tr>
                              <tr>
                                 <td><img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/man.svg') }}" loading="lazy"/></td>
                                 <td>
                                    <p>john doe</p>
                                    <small class="text-muted">dentist</small>
                                 </td>
                                 <td>
                                    <p class="text-muted">male</p>
                                 </td>
                                 <td class="text-right">
                                    <p>24y</p>
                                 </td>
                                 <td class="text-right"><button class="btn"><i class="las la-check-circle"></i></button><button class="btn"><i class="las la-times-circle"></i></button></td>
                                 <td><button class="btn btn-sm"><i class="las la-ellipsis-h"></i></button></td>
                              </tr>
                              <tr>
                                 <td><img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/man.svg') }}" loading="lazy"/></td>
                                 <td>
                                    <p>john doe</p>
                                    <small class="text-muted">dentist</small>
                                 </td>
                                 <td>
                                    <p class="text-muted">male</p>
                                 </td>
                                 <td class="text-right">
                                    <p>24y</p>
                                 </td>
                                 <td class="text-right"><button class="btn"><i class="las la-check-circle"></i></button><button class="btn"><i class="las la-times-circle"></i></button></td>
                                 <td><button class="btn btn-sm"><i class="las la-ellipsis-h"></i></button></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="card-footer"><a class="view-more" href="">more<i class="las la-angle-right"></i></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- <div class="modal onboarding-modal" tabindex="=1">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Welcome</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close"><i class="las la-times-circle"></i></button>
                  </div>
                  <div class="modal-body">
                     <div class="carousel slide" id="carouselExampleCaptions" data-ride="carousel">
                        <div class="carousel-inner">
                           <div class="carousel-item active">
                              <img class="d-block" src="{{ asset('assets/SiteAssets/images/undraw_dashboard_nklg.svg') }}" alt="..."/>
                              <div class="carousel-caption d-md-block">
                                 <p>intuitive<a href="" data-dismiss="modal">dashboard<i class="las la-external-link-alt"></i></a></p>
                              </div>
                           </div>
                           <div class="carousel-item">
                              <img class="d-block" src="{{ asset('assets/SiteAssets/images/undraw_medicine_b1ol.svg') }}" alt="..."/>
                              <div class="carousel-caption d-md-block">
                                 <p>access to<a href="specialists.html">specialists<i class="las la-external-link-alt"></i></a></p>
                              </div>
                           </div>
                           <div class="carousel-item">
                              <img class="d-block" src="{{ asset('assets/SiteAssets/images/undraw_receipt_ecdd.svg') }}" alt="..."/>
                              <div class="carousel-caption d-md-block">
                                 <p>simple<a href="procurement.html">procurement<i class="las la-external-link-alt"></i></a>process</p>
                              </div>
                           </div>
                           <div class="carousel-item">
                              <img class="d-block" src="{{ asset('assets/SiteAssets/images/undraw_new_notifications_fhvw.svg') }}" alt="..."/>
                              <div class="carousel-caption d-md-block">
                                 <p>comprehensive<a href="notifications.html">notification<i class="las la-external-link-alt"></i></a>center</p>
                              </div>
                           </div>
                           <div class="carousel-item">
                              <img class="d-block" src="{{ asset('assets/SiteAssets/images/undraw_Preferences_re_49in.svg') }}" alt="..."/>
                              <div class="carousel-caption d-md-block">
                                 <p>minimalist<a href="settings.html">settings<i class="las la-external-link-alt"></i></a>center</p>
                              </div>
                           </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev"><i class="las la-chevron-circle-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next"><i class="las la-chevron-circle-right"></i><span class="sr-only">Next</span></a>
                     </div>
                  </div>
               </div>
            </div>
         </div> -->
      </div>
      <footer>
         <!-- <div class="page-footer text-center">
            <div class="fixed-bottom shadow-sm"><a href="https://covid19.who.int" target="_blank"><img src="{{ asset('assets/SiteAssets/images/covid-19.svg') }}"/><span>view COVID-19 info</span></a></div>
         </div> -->
      </footer>
   </div>
@endsection

@section('layout_js')
   <script src="{{ asset('assets/SiteAssets/js/vendors/Chart.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/SiteAssets/js/dashboard.js') }}"></script>  
@endsection
