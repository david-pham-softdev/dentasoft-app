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
         <h5 class="page-title">Material</h5>
      </div>
      <div class="section profile-section">
         <div class="card container">
            <div class="card-header">
               <h5>Create Material</h5>
            </div>
            <div class="card-body">
               <div class="sub-section col-md-12">
                  <div class="sub-section-body">
                     <form action="{{ route('material.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="user-details-form">
                           <div class="form-row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Name</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="First Name" required="" value="{{ old('name') }}">
                                    @if($errors->has('name'))
                                       <span class="invalid-feedback">
                                          <strong>{{ $errors->first('name') }}</strong>
                                       </span>
                                    @endif
                                 </div>
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

