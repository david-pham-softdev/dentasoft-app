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
            <a href="{{ route('material.create') }}" class="btn btn-dark-red-f-gr">
               <i class="las la-plus-circle"></i>add a new material
            </a>
         </div>
      </div>
      <div class="section patients-table-view">
         <table class="table table-hover table-responsive-lg">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Material name</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($materials as $key => $material)
                  @if (!empty($material))
                  <tr>
                     <td>{{ (int)$key + 1 }}</td>
                     <td>{{ $material['name'] }}</td>
                     <td>
                        <a class="btn btn-warning  btn-xs" href="{{ route('material.edit', $material->id) }}" title="Edit"><i class="la la-pencil"></i></a>
                        <a class="btn btn-danger  btn-xs" href="#" title="Delete" data-toggle="modal" data-target="#modal-delete-{{ $material->id }}"><i class="la la-trash"></i></a>
                     </td>
                  </tr>

                  <div class="modal fade" id="modal-delete-{{ $material->id }}">
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
                              <a href="{{ route('material.destroy', $material->id) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
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
         {{ $materials->links() }}
      </div>

   </div>
</div>
@endsection

@section('layout_js')
<script src="{{ asset('assets/SiteAssets/js/patients.js') }}"></script>
@endsection
