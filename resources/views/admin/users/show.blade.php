@extends('layouts.Admin.index')
@section('title')User details
@endsection
@section('layout_css')
<link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/pages/settings.css') }}"/>
@endsection
@section('content')
<div class="main-content">
   <div class="container-fluid">
      <div class="section profile-section">
         <div class="card container">
            <div class="card-body">
               <div class="sub-section col-lg-10 col-md-12">
               <div class="sub-section-body">
                  <div class="row">
                     <div class="col-lg-4 col-md-4">
                        <img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/doctor.svg') }}" />
                     </div>
                  </div>
               </div>
               </div>
               <div class="sub-section col-md-12">
               <div class="sub-section-title">
                  <h6>User details</h6>
               </div>
               <div class="sub-section-body">
                  <div class="user-details-form">
                     <div class="form-row">
                        <div class="form-group col-sm-6">
                           <label>first name</label>
                           <input class="form-control" value="{{$user->first_name}}" readonly/>
                        </div>
                        <div class="form-group col-sm-6">
                           <label>last name</label>
                           <input class="form-control" value="{{$user->last_name}}" readonly />
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Company name</label>
                           <input class="form-control" value="{{$user->company}}" readonly/>
                        </div>
                        <div class="form-group col-sm-6">
                           <label>email address</label>
                           <input class="form-control" value="{{$user->email}}" readonly/>
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Mobile number</label>
                           <input class="form-control" value="{{$user->phone_number}}" readonly />
                        </div>
                        <div class="form-group col-sm-12">
                           <a class="btn btn-dark-blue-f mt-4" href="{{route('laboratory')}}">
                           <i class="la la-arrow-circle-o-left"></i>Back</a>
                        </div>
                        
                     </div>
                  </div>
               </div>
               </div>
            </div>
         </div>

         <div class="card container">
              <div class="card-header">
                <h5>List of laboratories</h5>
              </div>
              <div class="card-body">
                <div class="sub-section col-sm-12">
                  <div class="sub-section-body">
                     <div class="section patients-table-view">
                        <table class="table table-hover table-responsive-lg">
                           <thead>
                              <tr>
                                 <th>No.</th>
                                 <th>Company</th>
                                 <th>Name</th>
                                 <th>E-mail</th>
                                 <th>Mobile Number</th>
                                 <th>Client Type</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($laboratories as $key => $laboratory)
                                 @if (!empty($laboratory))
                                 <tr>
                                    <td>{{ ((int)$key + 1) }}</td>
                                    <td>{{ $laboratory->company ?? 'N/A' }}</td>
                                    <td>{{ $laboratory->first_name. ' ' .$laboratory->last_name  }}</td>
                                    <td>{{ $laboratory->email }}</td>
                                    <td>{{ $laboratory->phone_number ?? 'N/A' }}</td>
                                    <td>{{ $laboratory->roles[0]->name === 'Lab' ? 'Laboratory' : 'Dentist' }}</td>
                                 </tr>

                                 <div class="modal fade" id="modal-delete-{{ $laboratory->id }}">
                                    <div class="modal-dialog">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title"><i class="fa fa-warning"></i> Caution!!</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <p>Do you really want to delete ?</p>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                             <a href="{{ route('laboratory.destroy', $user->id) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 @endif
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
                </div>
              </div>
              <div class="form-group col-sm-12">
                  <a class="btn btn-dark-blue-f mt-4" href="{{route('laboratory')}}">
                  <i class="la la-arrow-circle-o-left"></i>Back</a>
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
@endsection

@section('layout_js')
<script src="{{ asset('assets/SiteAssets/js/patients.js') }}"></script>
@endsection

