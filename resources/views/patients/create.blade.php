@extends('layouts.Admin.index')
@section('title')Dashboard
@endsection
@section('layout_css')
<link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/pages/settings.css') }}"/>
@endsection
@section('content')
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
@endsection

@section('layout_js')
<script src="{{ asset('assets/SiteAssets/js/patients.js') }}"></script>
@endsection

