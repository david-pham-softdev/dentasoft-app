@extends('layouts.Admin.index')
@section('title')Setting
@endsection
@section('layout_css')
<link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/pages/settings.css') }}"/>
@endsection
@section('content')
<div class="main-content">
   <div class="container-fluid">
      <div class="section">
      <h5 class="page-title">settings</h5>
      </div>
      <div class="section profile-section">
      <div class="card container">
         <div class="card-header">
            <h5>personal details</h5>
            <p>This section contains your basic profile information like name, email etc</p>
         </div>
         <div class="card-body">
            <div class="sub-section col-lg-10 col-md-12">
            <div class="sub-section-title">
               <h6>profile picture</h6>
            </div>
            <div class="sub-section-body">
               <div class="row">
                  <div class="col-lg-2 col-md-4">
                  <img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/doctor.svg') }}" />
                  </div>
                  <div class="col-lg-6 col-md-8">
                  <div class="d-flex mb-2">
                     <button class="btn btn-sm btn-dark-red-f">
                        <i class="las la-upload"></i>upload new photo </button>
                     <button class="btn btn-sm btn-darker-grey-o ml-2">
                        <i class="las la-trash"></i>remove </button>
                  </div>
                  <p>You can upload .jpg, .gif or .png image files</p>
                  <p>max file size <b> 3mb</b>
                  </p>
                  </div>
               </div>
            </div>
            </div>
            <div class="sub-section col-md-12 col-lg-10">
            <div class="sub-section-title">
               <h6>profile details</h6>
            </div>
            <div class="sub-section-body">
               <div class="user-details-form">
                  <form method="POST" action="{{ route('setting.update.profile', $user->id) }}">
                     {{ csrf_field() }}
                     <input type="hidden" name="_method" value="put">
                     <div class="form-row">
                        <div class="form-group col-sm-6">
                           <label>first name</label>
                           <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" value="{{ $user->first_name ?? old('first_name') }}" name="first_name"/>
                           @if($errors->has('first_name'))
                              <span class="invalid-feedback">
                                 <strong>{{ $errors->first('first_name') }}</strong>
                              </span>
                           @endif
                        </div>
                        <div class="form-group col-sm-6">
                           <label>last name</label>
                           <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" value="{{ $user->last_name ?? old('last_name') }}" name="last_name"/>
                           @if($errors->has('last_name'))
                              <span class="invalid-feedback">
                                 <strong>{{ $errors->first('last_name   ') }}</strong>
                              </span>
                           @endif
                        </div>
                        <div class="form-group col-sm-6">
                           <label>email address</label>
                           <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ $user->email ?? old('email') }}" name="email"/>
                           @if($errors->has('email'))
                              <span class="invalid-feedback">
                                 <strong>{{ $errors->first('email') }}</strong>
                              </span>
                           @endif
                        </div>
                        <div class="form-group col-sm-6">
                           <label>telephone number</label>
                           <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" value="{{ $user->phone_number ?? old('phone_number') }}" type="tel" name="phone_number"/>
                           @if($errors->has('phone_number'))
                              <span class="invalid-feedback">
                                 <strong>{{ $errors->first('phone_number') }}</strong>
                              </span>
                           @endif
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Company</label>
                           <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" value="{{ $user->company ?? old('company') }}" type="tex" name="company" />
                           @if($errors->has('company'))
                              <span class="invalid-feedback">
                                 <strong>{{ $errors->first('company') }}</strong>
                              </span>
                           @endif
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Code Elab</label>
                           <input class="form-control {{ $errors->has('code_elab') ? 'is-invalid' : '' }}" value="{{ $user->code_elab ?? old('code_elab') }}" type="tex" name="code_elab" />
                           @if($errors->has('code_elab'))
                              <span class="invalid-feedback">
                                 <strong>{{ $errors->first('code_elab') }}</strong>
                              </span>
                           @endif
                        </div>
                     </div>
                  
                     <button class="btn btn-dark-red-f-gr mt-4" type="submit">
                     <i class="las la-save"></i>save changes </button>
                  </form>
               </div>
            </div>
            </div>
         </div>
      </div>
      <div class="card container">
         <div class="card-header">
            <h5>password</h5>
            <p>A secure password and updated recovery info help protect your account.</p>
         </div>
         <div class="card-body">
            <div class="sub-section col-sm-8 col-md-12 col-lg-8">
            <div class="sub-section-body">
               <div class="user-password-form">
                  <form method="POST" action="{{ route('setting.update.password', $user->id) }}">
                     {{ csrf_field() }}
                     <input type="hidden" name="_method" value="put">
                     <div class="form-row">
                        <div class="form-group col-sm-8">
                           <label>new password</label>
                           <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" value="************" type="password" name="password" />
                        </div>
                        <div class="form-group col-sm-8">
                           <label>re-type new password</label>
                           <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" value="************" type="password" name="password_confirmation"/>
                           @if($errors->has('password'))
                              <span class="invalid-feedback">
                                 <strong>{{ $errors->first('password') }}</strong>
                              </span>
                           @endif
                        </div>
                     </div>
                     <button class="btn btn-dark-red-f-gr mt-4" type="submit">
                     <i class="las la-sync"></i>change my password </button>
                  </form>
               </div>
            </div>
            </div>
         </div>
      </div>
      </div>
   </div>
</div>
@endsection

@section('layout_js')
<script src="{{ asset('assets/SiteAssets/js/patients.js') }}"></script>
@endsection

