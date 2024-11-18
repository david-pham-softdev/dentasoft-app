@extends('layouts.Admin.index')
@section('title')Dashboard
@endsection
@section('layout_css')
<link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/pages/patients.css') }}"/>
@endsection
@section('content')
<div class="main-content">
   <div class="container-fluid">
      <div class="section title-section">
         <h5 class="page-title"></h5>
      </div>
      <div class="section filters-section">
         <!-- <div class="dropdowns-wrapper">
            <div class="dropdown">
               <a class="btn btn-dark-red-o dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">filter</a>
               <div class="dropdown-menu shadow-lg" aria-labelledby="dropdownMenuLink"><a class="dropdown-item" href="#">age</a><a class="dropdown-item" href="#">diagnosis</a><a class="dropdown-item" href="#">triage</a></div>
            </div>
            <div class="dropdown">
               <a class="btn btn-dark-red-o dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">sort by</a>
               <div class="dropdown-menu shadow-lg" aria-labelledby="dropdownMenuLink"><a class="dropdown-item" href="#">patient id</a><a class="dropdown-item" href="#">patient name</a><a class="dropdown-item" href="#">age</a><a class="dropdown-item" href="#">date of birth</a><a class="dropdown-item" href="#">diagnosis</a><a class="dropdown-item" href="#">triage</a></div>
            </div>
         </div> -->
         <div class="switch-view-btns">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
               <label class="btn btn-darker-grey-o active">
                  <input id="table-view-btn" type="radio" name="options" checked=""/>
                  <i class="las la-list-ul"></i>
               </label>
               <label class="btn btn-darker-grey-o">
                  <input id="card-view-btn" type="radio" name="options"/>
                  <i class="las la-th-large"></i>
               </label>
               
            </div>
         </div>
         <div class="buttons-wrapper ml-auto">
            <a href="{{ route('patient.create') }}" class="btn btn-dark-red-f-gr">
               <i class="las la-plus-circle"></i>add a new patient
            </a>
         </div>
      </div>
      <div class="section patients-card-view no-display">
         <div class="row">
         @foreach($patients as $patient)
            @if (!empty($patient))
            <div class="col-md-3">
               <div class="card">
                  <div class="card-header">
                     <div class="card-img-top">
                        <img class="rounded-circle" src="{{ asset('assets/SiteAssets/images/people.svg') }}" loading="lazy"/>
                        <!-- <a class="view-more" href="{{ route('patient.show', $patient->id) }}">view profile</a> -->
                     </div>
                  </div>
                  
                     <div class="card-body">
                        <div class="card-subsection-title">
                           <h5>{{ $patient['first_name']. ' ' .$patient['last_name'] }}</h5>
                        </div>
                        <div class="card-subsection-body">
                           <label class="text-muted">E-mail</label>
                           <p style="text-transform: none;">{{ $patient['email'] }}</p>
                           <label class="text-muted">age</label>
                           <p>{{ $patient['age'] }}</p>
                           <label class="text-muted">Gender</label>
                           <p>{{ $patient['gender'] }}</p>
                        </div>
                     </div>
                     <div class="card-footer text-right">
                        <a class="btn btn-warning  btn-xs" href="{{ route('patient.edit', $patient->id) }}" title="Edit"><i class="la la-pencil"></i></a> 
                        <a class="btn btn-danger  btn-xs" href="#" title="Delete" data-toggle="modal" data-target="#modal-card-delete-{{ $patient->id }}"><i class="la la-trash"></i></a>
                     </div>
               </div>
            </div>
            <div class="modal fade" id="modal-card-delete-{{ $patient->id }}">
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
                        <a href="{{ route('patient.destroy', $patient->id) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
                     </div>
                  </div>
               </div>
            </div>
            @endif
         @endforeach
         </div>
      </div>
      <div class="section patients-table-view">
         <table class="table table-hover table-responsive-lg">
            <thead>
               <tr>
                  <th>patient ID</th>
                  <th>patient name</th>
                  <th>E-mail</th>
                  <th>age</th>
                  <th>gender</th>
                  <th>Action</th>
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
                        <!-- <a class="btn btn-default  btn-xs" href="{{ route('patient.show', $patient->id) }}" title="View"><i class="la la-eye"></i></a> -->
                        <a class="btn btn-warning  btn-xs" href="{{ route('patient.edit', $patient->id) }}" title="Edit"><i class="la la-pencil"></i></a> 
                        <a class="btn btn-danger  btn-xs" href="#" title="Delete" data-toggle="modal" data-target="#modal-delete-{{ $patient->id }}"><i class="la la-trash"></i></a>
                     </td>
                  </tr>

                  <div class="modal fade" id="modal-delete-{{ $patient->id }}">
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
                              <a href="{{ route('patient.destroy', $patient->id) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
               @endforeach
            </tbody>
         </table>
      </div>
      <div class="col-md-12 text-center" style="justify-items: flex-end;">
         {{ $patients->links() }}
      </div>
      
   </div>
</div>
@endsection

@section('layout_js')
<script src="{{ asset('assets/SiteAssets/js/patients.js') }}"></script>
@endsection
