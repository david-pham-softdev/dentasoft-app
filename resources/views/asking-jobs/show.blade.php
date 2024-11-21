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
               <div class="sub-section col-md-12">
               <div class="sub-section-title">
                  <h6>Asking job details</h6>
               </div>
               <div class="sub-section-body">
                  <div class="user-details-form">
                     <div class="form-row">
                        <div class="form-group col-sm-6">
                           <label>User name:</label>
                           <input class="form-control" value="{{$asking_job->user->name}}" readonly/>
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Laboratory name:</label>
                           <input class="form-control" value="{{$asking_job->userElab->name}}" readonly />
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Patient name:</label>
                           <input class="form-control" value="{{$asking_job->patient->name}}" readonly />
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Material name:</label>
                           <input class="form-control" value="{{$asking_job->material->name}}" readonly />
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Tooth Number:</label>
                           <input class="form-control" value="{{$asking_job->material->name}}" readonly />
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Shade:</label>
                           <input class="form-control" value="{{$asking_job->material->name}}" readonly />
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Work Delivery Date:</label>
                           <input class="form-control" value="{{$asking_job->material->name}}" readonly />
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Work Delivery Time:</label>
                           <input class="form-control" value="{{$asking_job->material->name}}" readonly />
                        </div>
                        <div class="form-group col-sm-12">
                           <label>Dental chart:</label>
                           @if ($asking_job->dental_chart)
                            <img
                                src="{{ asset('/storage/'.$asking_job->dental_chart) }}"
                                alt="{{ asset('/storage/'.$asking_job->dental_chart) }}"
                                style="max-width: 100%; max-height: 100%; object-fit: contain">
                           @endif
                        </div>
                        <div class="form-group col-sm-6">
                           <label for="nome">Notes:</label>
                           <textarea class="form-control" rows="5" readonly>{!! $asking_job->notes !!}</textarea>
                        </div>
                        <div class="form-group col-sm-6">
                           <label for="nome">Delivery remarks:</label>
                           <textarea class="form-control" rows="5" readonly>{!! $asking_job->delivery_remarks !!}</textarea>
                        </div>
                        <div class="form-group col-sm-12">
                           <label>Attachments:</label>
                           @php
                              $decodedData = json_decode($asking_job->attachment, true);
                           @endphp
                            <div class="row">
                           @foreach ($decodedData as $image)
                              <div class="col-lg-4 mb-3" >
                                 <img src="{{ asset('storage/' . $image['path']) }}" alt="{{ $image['name'] }}">
                              </div>
                           @endforeach
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                           <a class="btn btn-dark-blue-f mt-4" href="{{route('asking-job')}}">
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

