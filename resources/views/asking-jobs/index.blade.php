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
         <div class="buttons-wrapper ml-auto">
            <a href="{{ route('asking-job.create') }}" class="btn btn-dark-red-f-gr">
               <i class="las la-plus-circle"></i>add a new asking job
            </a>
         </div>
      </div>
      <div class="section patients-table-view">
         <table class="table table-hover table-responsive-lg">
            <thead>
               <tr>
                  <th>No</th>
                  <th>User</th>
                  <th>Laboratory</th>
                  <th>Patient</th>
                  <th>Tooth Number</th>
                  <th>Shade</th>
                  <th>Material</th>
                  <th>Work Delivery Date</th>
                  <th>Work Delivery Time</th>
                  <th width="170px">Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($asking_jobs as $key => $asking_job)
                  @if (!empty($asking_job))
                  <tr>
                     <td>{{ (int)$key + 1 }}</td>
                     <td>{{ $asking_job->user->name }}</td>
                     <td>{{ $asking_job->userElab->name }}</td>
                     <td>{{ $asking_job->patient->name }}</td>
                     <td>{{ $asking_job->tooth_number }}</td>
                     <td>{{ $asking_job->shade }}</td>
                     <td>{{ $asking_job->material->name }}</td>
                     <td>{{ $asking_job->formatted_delivery_date ?? 'N/A' }}</td>
                     <td>{{ $asking_job->formatted_delivery_time ?? 'N/A' }}</td>
                     <td>
                        <a class="btn btn-warning  btn-xs" href="{{ route('asking-job.edit', $asking_job->id) }}" title="Edit"><i class="la la-pencil"></i></a>
                        <a class="btn btn-danger  btn-xs" href="#" title="Delete" data-toggle="modal" data-target="#modal-delete-{{ $asking_job->id }}"><i class="la la-trash"></i></a>
                     </td>
                  </tr>

                  <div class="modal fade" id="modal-delete-{{ $asking_job->id }}">
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
                              <a href="{{ route('asking-job.destroy', $asking_job->id) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
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
         {{ $asking_jobs->links() }}
      </div>

   </div>
</div>
@endsection

@section('layout_js')
<script src="{{ asset('assets/SiteAssets/js/patients.js') }}"></script>
@endsection
