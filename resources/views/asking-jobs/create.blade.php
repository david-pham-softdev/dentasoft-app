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
               <h5>Create Asking Job</h5>
            </div>
            <div class="card-body">
               <div class="sub-section col-md-12">
                  <div class="sub-section-body">
                     <form action="{{ route('asking-job.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="user-details-form">
                           <div class="form-row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Laboratory Reference:</label>
                                    <select name="user_elab_id" class="form-control {{ $errors->has('laboratories') ? 'is-invalid' : '' }}" data-placeholder="Laboratory Reference" required="">
                                       <option value=""> Select option</option>
                                       @foreach($laboratories as $laboratory)
                                          <option value="{{ $laboratory->id}}"> {{ $laboratory->name}} </option>
                                       @endforeach
                                    </select>
                                    @if($errors->has('laboratories'))
                                          <span class="help-block">
                                             <strong>{{ $errors->first('laboratories') }}</strong>
                                          </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Patient:</label>
                                    <select name="patient_id" class="form-control {{ $errors->has('patients') ? 'is-invalid' : '' }}" data-placeholder="Laboratory Reference" required="">
                                       <option value=""> Select option</option>
                                       @foreach($patients as $patient)
                                          <option value="{{ $patient->id}}"> {{ $patient->first_name .' '. $patient->last_name}} </option>
                                       @endforeach
                                    </select>
                                    @if($errors->has('patients'))
                                          <span class="help-block">
                                             <strong>{{ $errors->first('patients') }}</strong>
                                          </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Tooth Number:</label>
                                    <input type="number" name="tooth_number" class="form-control {{ $errors->has('tooth_number') ? 'is-invalid' : '' }}" placeholder="Tooth Number" min="1" max="32" required="" value="{{ old('tooth_number') }}">
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
                                    <input type="text" name="shade" class="form-control {{ $errors->has('shade') ? 'is-invalid' : '' }}" placeholder="Shade" required="" value="{{ old('shade') }}">
                                    @if($errors->has('shade'))
                                       <span class="invalid-feedback">
                                          <strong>{{ $errors->first('shade') }}</strong>
                                       </span>
                                    @endif
                                 </div>
                              </div>
                              <!-- <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Drawing:</label>
                                    <input type="text" name="dental_chart" class="form-control {{ $errors->has('dental_chart') ? 'is-invalid' : '' }}" placeholder="Tooth Number" required="" value="{{ old('dental_chart') }}">
                                    @if($errors->has('dental_chart'))
                                       <span class="invalid-feedback">
                                          <strong>{{ $errors->first('dental_chart') }}</strong>
                                       </span>
                                    @endif
                                 </div>
                              </div> -->

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Work delivery date:</label>
                                    <input type="date" name="work_delivery_date" id="work_delivery_date" class="form-control {{ $errors->has('work_delivery_date') ? 'is-invalid' : '' }}" placeholder="Work delivery date" required="" value="{{ old('work_delivery_date') }}">
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
                                    <input type="time" name="work_delivery_time" class="form-control {{ $errors->has('work_delivery_time') ? 'is-invalid' : '' }}" placeholder="Work delivery time" required="" value="{{ old('work_delivery_time') ?? '00:00' }}">
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
                                    <select name="material_id" class="form-control {{ $errors->has('materials') ? 'is-invalid' : '' }}" data-placeholder="Laboratory Reference" required="">
                                       <option value=""> Select option</option>
                                       @foreach($materials as $material)
                                          <option value="{{ $material->id}}"> {{ $material->name}} </option>
                                       @endforeach
                                    </select>
                                    @if($errors->has('materials'))
                                          <span class="help-block">
                                             <strong>{{ $errors->first('materials') }}</strong>
                                          </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-lg-6">
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="nome drawing">dental chart:</label>
                                    <div class="mb-3">
                                       <canvas id="drawingCanvas" width="700" height="350" style="border:1px solid #ccc;"></canvas>
                                    </div>
                                    <button id="saveDrawing" class="btn btn-primary btn-file">Save Chart</button>
                                       <span id="saveMessage"></span>
                                    <input type="hidden" id="drawingData" name="dental_chart" class="{{ $errors->has('dental_chart') ? 'is-invalid' : '' }}">
                                    @if($errors->has('dental_chart'))
                                       <span class="invalid-feedback">
                                          <strong>{{ $errors->first('dental_chart') }}</strong>
                                       </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="nome">Notes:</label>
                                    <textarea rows="5" name="notes" class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" id="validationTextarea" placeholder="Notes" required>{!! old('notes') !!}</textarea>
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
                                    <textarea rows="5" name="delivery_remarks" class="form-control {{ $errors->has('delivery_remarks') ? 'is-invalid' : '' }}" id="validationTextarea" placeholder="Delivery remarks" required>{!! old('delivery_remarks') !!}</textarea>
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
</div>
@endsection

@section('layout_js')
<script src="{{ asset('assets/SiteAssets/js/plugins/buffer.min.js') }}"></script>
<script src="{{ asset('assets/SiteAssets/js/plugins/filetype.min.js') }}"></script>
<script src="{{ asset('assets/SiteAssets/js/fileinput/fileinput.js') }}"></script>
<script>
   const currentDate = new Date();
   const formattedDate = currentDate.toISOString().split('T')[0];
   document.getElementById('work_delivery_date').value = formattedDate;

   $("#attachments").fileinput({
      theme: 'fa5',
      uploadUrl: '#', // you must set a valid URL here else you will get an error
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




      const host = window.location.origin;
		var canvas = document.getElementById('drawingCanvas');
		var ctx = canvas.getContext('2d');
		var drawing = false;
		var lastX = 0;
		var lastY = 0;
		var backgroundImage = new Image();

		backgroundImage.onload = function() {
			ctx.drawImage(backgroundImage, 0, 0, canvas.width, canvas.height);
		}
		backgroundImage.src =  host + '/img/asking-job/Dental-Chart-1024x487.png'; // Replace with the URL of your image

		canvas.addEventListener('mousedown', function(e) {
			drawing = true;
			lastX = e.offsetX;
			lastY = e.offsetY;
		});

		canvas.addEventListener('mousemove', function(e) {
			if (drawing) {
				ctx.beginPath();
				ctx.moveTo(lastX, lastY);
				ctx.lineTo(e.offsetX, e.offsetY);
				ctx.stroke();
				lastX = e.offsetX;
				lastY = e.offsetY;
			}
		});

		canvas.addEventListener('mouseup', function() {
			drawing = false;
		});

		canvas.addEventListener('mouseleave', function() {
			drawing = false;
		});

        var canvasChanged = false;

        canvas.addEventListener('mousedown', function(e) {
            drawing = true;
            lastX = e.offsetX;
            lastY = e.offsetY;
            canvasChanged = true; // Indique que le canvas a été modifié
        });

        document.getElementById('saveDrawing').addEventListener('click', function(e) {
            e.preventDefault();
            if (canvasChanged) {
                var drawingData = canvas.toDataURL('image/png');
                document.getElementById('drawingData').value = drawingData;
                document.getElementById('saveMessage').textContent = 'Saved!';
                document.getElementById('saveMessage').style.color = 'green';
            } else {
                document.getElementById('saveMessage').textContent = 'No drawing to save.';
                document.getElementById('saveMessage').style.color = 'red';
            }
        });
</script>
@endsection

