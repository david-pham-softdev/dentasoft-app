@extends('layouts.Admin.index')
@section('title')Dashboard
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
                  <h6>Laboratory details</h6>
               </div>
               <div class="sub-section-body">
                  <div class="user-details-form">
                     <div class="form-row">
                        <div class="form-group col-sm-6">
                           <label>first name</label>
                           <input class="form-control" value="{{$laboratory->first_name}}" readonly/>
                        </div>
                        <div class="form-group col-sm-6">
                           <label>last name</label>
                           <input class="form-control" value="{{$laboratory->last_name}}" readonly />
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Company name</label>
                           <input class="form-control" value="{{$laboratory->company}}" readonly/>
                        </div>
                        <div class="form-group col-sm-6">
                           <label>email address</label>
                           <input class="form-control" value="{{$laboratory->email}}" readonly/>
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Mobile number</label>
                           <input class="form-control" value="{{$laboratory->phone_number}}" readonly />
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

