@extends('layouts.Admin.index')
@section('title')Asking Job
@endsection
@section('layout_css')
<link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/pages/settings.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/SiteAssets/css/fileinput/fileinput.css') }}"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
@endsection
@section('content')
<div class="main-content">
   <div class="container-fluid">
      <div class="section">
         <h5 class="page-title">Asking Job</h5>
      </div>
      <div class="section profile-section">
         <div class="card container">
            <div class="card-header">
               <h5>Edit Asking Job</h5>
            </div>
            <div class="card-body">
               <div class="sub-section col-md-12">
                  <div class="sub-section-body">
                     <form action="{{ route('asking-job.update', $asking_job->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="user-details-form">
                           <div class="form-row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Laboratory Reference:</label>
                                    <select name="user_elab_id" class="form-control {{ $errors->has('user_elab_id') ? 'is-invalid' : '' }}" data-placeholder="Laboratory Reference" required="">
                                       @foreach($laboratories as $laboratory)
                                          <option value="{{ $laboratory->id}}" {{ $laboratory->id == $asking_job->user_elab_id ? 'selected' : ''}}> {{ $laboratory->name}} </option>
                                       @endforeach
                                    </select>
                                    @if($errors->has('user_elab_id'))
                                          <span class="help-block">
                                             <strong>{{ $errors->first('user_elab_id') }}</strong>
                                          </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Patient:</label>
                                    <select name="patient_id" class="form-control {{ $errors->has('patient_id') ? 'is-invalid' : '' }}" data-placeholder="Laboratory Reference" required="">
                                       <option value=""> Select option</option>
                                       @foreach($patients as $patient)
                                          <option value="{{ $patient->id}}" {{ $patient->id == $asking_job->patient_id ? 'selected' : ''}}> {{ $patient->name }} </option>
                                       @endforeach
                                    </select>
                                    @if($errors->has('patient_id'))
                                          <span class="help-block">
                                             <strong>{{ $errors->first('patient_id') }}</strong>
                                          </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Tooth Number:</label>
                                    <input type="number" name="tooth_number" class="form-control {{ $errors->has('tooth_number') ? 'is-invalid' : '' }}" placeholder="Tooth Number" min="1" max="32" required="" value="{{ $asking_job->tooth_number }}">
                                    @if($errors->has('tooth_number'))
                                       <span class="invalid-feedback">
                                          <strong>{{ $errors->first('tooth_number') }}</strong>
                                       </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Shade:</label>
                                    <input type="text" name="shade" class="form-control {{ $errors->has('shade') ? 'is-invalid' : '' }}" placeholder="Shade" required="" value="{{ $asking_job->shade }}">
                                    @if($errors->has('shade'))
                                       <span class="invalid-feedback">
                                          <strong>{{ $errors->first('shade') }}</strong>
                                       </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Work delivery date:</label>
                                    <input type="date" name="work_delivery_date" id="work_delivery_date" class="form-control {{ $errors->has('work_delivery_date') ? 'is-invalid' : '' }}" placeholder="Work delivery date" required="" value="{{ $asking_job->work_delivery_date->format('Y-m-d') }}">
                                    @if($errors->has('work_delivery_date'))
                                       <span class="invalid-feedback">
                                          <strong>{{ $errors->first('work_delivery_date') }}</strong>
                                       </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Work delivery time:</label>
                                    <input type="time" name="work_delivery_time" class="form-control {{ $errors->has('work_delivery_time') ? 'is-invalid' : '' }}" placeholder="Work delivery time" required="" value="{{ $asking_job->formatted_delivery_time ?? '00:00' }}">
                                    @if($errors->has('work_delivery_time'))
                                       <span class="invalid-feedback">
                                          <strong>{{ $errors->first('work_delivery_time') }}</strong>
                                       </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Materials:</label>
                                    <select name="material_id" class="form-control {{ $errors->has('material_id') ? 'is-invalid' : '' }}" data-placeholder="Laboratory Reference" required="">
                                       @foreach($materials as $material)
                                          <option value="{{ $material->id}}" {{ $material->id == $asking_job->material_id ? 'selected' : ''}}> {{ $material->name}} </option>
                                       @endforeach
                                    </select>
                                    @if($errors->has('material_id'))
                                          <span class="help-block">
                                             <strong>{{ $errors->first('material_id') }}</strong>
                                          </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                  <!-- <div class="form-group">
                                    <label for="nome">Drawing:</label>
                                    <input type="text" name="dental_chart" class="form-control {{ $errors->has('dental_chart') ? 'is-invalid' : '' }}" placeholder="Tooth Number" required="" value="{{ old('dental_chart') }}">
                                    @if($errors->has('dental_chart'))
                                       <span class="invalid-feedback">
                                          <strong>{{ $errors->first('dental_chart') }}</strong>
                                       </span>
                                    @endif
                                 </div> -->
                              </div>


                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Notes:</label>
                                    <textarea rows="5" name="notes" class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" id="validationTextarea" placeholder="Notes" required value="{!! $asking_job->notes !!}">{!! $asking_job->notes !!}</textarea>
                                    @if($errors->has('notes'))
                                       <span class="invalid-feedback">
                                          <strong>{{ $errors->first('notes') }}</strong>
                                       </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Delivery remarks:</label>
                                    <textarea rows="5" name="delivery_remarks" class="form-control {{ $errors->has('delivery_remarks') ? 'is-invalid' : '' }}" id="validationTextarea" placeholder="Delivery remarks" required>{!! $asking_job->delivery_remarks !!}</textarea>
                                    @if($errors->has('delivery_remarks'))
                                       <span class="invalid-feedback">
                                          <strong>{{ $errors->first('delivery_remarks') }}</strong>
                                       </span>
                                    @endif
                                 </div>
                              </div>

                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="nome">Attachments:</label>
                                    <div class="mb-3">
                                       <div class="file-loading {{ $errors->has('attachments') ? 'is-invalid' : '' }}">
                                          <input name="attachments[]" id="attachments" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2" data-theme="fa5">
                                       </div>
                                        @if($errors->has('attachments'))
                                            <span class="invalid-feedback">
                                              <strong>{{ $errors->first('attachments') }}</strong>
                                           </span>
                                        @endif
                                    </div>

                                 </div>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-dark-red-f-gr mt-4 pull-right">
                              <i class="las la-save"></i> Save
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
<script src="{{ asset('assets/SiteAssets/js/plugins/buffer.min.js') }}"></script>
<script src="{{ asset('assets/SiteAssets/js/plugins/filetype.min.js') }}"></script>
<script src="{{ asset('assets/SiteAssets/js/fileinput/fileinput.js') }}"></script>
<script>
   // const currentDate = new Date();
   // const formattedDate = currentDate.toISOString().split('T')[0];
   // document.getElementById('work_delivery_date').value = formattedDate;

   // const fullDomain = window.location.origin;
   // const attachments = @json($asking_job->attachment);
   // const initialPreview = [];
   // const initialPreviewConfig = [];
   // for (const attachment of JSON.parse(attachments)) {
   //     initialPreview.push(fullDomain +'/storage/'+ attachment.path);
   //     initialPreviewConfig.push({
   //         caption: attachment.name,
   //         size: 329892,
   //         width: "120px",
   //         url: fullDomain +'/storage/'+ attachment.path,
   //         key: attachment.id
   //     });
   // }
   $("#attachments").fileinput({
      theme: 'fa5',
      uploadUrl: '#',
      allowedFileExtensions: ['jpeg', 'png', 'jpg', 'gif', 'svg'],
      overwriteInitial: false,
      maxFileSize: 1048,
      maxFileCount: 10,
      showUpload: false,
      showClose: false,
      slugCallback: function (filename) {
         return filename.replace('(', '_').replace(']', '_');
      }
   });
</script>
@endsection
