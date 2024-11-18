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
            <a href="{{ route('patient.create') }}" class="btn btn-dark-red-f-gr" data-toggle="modal" data-target="#modal-add-elab-code">
               <i class="las la-plus-circle"></i>Add laboratory by Elab Code
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
         </div>
      </div>
      <div class="section patients-table-view">
         <table class="table table-hover table-responsive-lg">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Company</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Mobile Number</th>
                  <th>Action</th>
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
                     <td>
                        <a class="btn btn-default  btn-xs" href="{{ route('laboratory.show', $laboratory->id) }}" title="View"><i class="la la-eye"></i></a>
                        <a class="btn btn-danger  btn-xs" href="#" title="Delete" data-toggle="modal" data-target="#modal-delete-{{ $laboratory->id }}"><i class="la la-trash"></i></a>
                     </td>
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
                              <a href="{{ route('laboratory.destroy', $laboratory->id) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
               @endforeach
            </tbody>
         </table>
      </div>
      <div class="col-md-12 text-right" style="justify-items: flex-end;">
         {{ $laboratories->links() }}
      </div>
      
   </div>
</div>
@endsection

@section('layout_js')
<script src="{{ asset('assets/SiteAssets/js/patients.js') }}"></script>
@endsection
