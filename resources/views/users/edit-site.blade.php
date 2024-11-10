@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Edit Site User')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('user') }}" class="link_menu_page">
			<i class="fa fa-user"></i> Users
		</a>								
	</li>

@endsection

@section('content')    
    @if (isset($user['Id']))
        <div class="box box-primary">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-12">	
    					 <form action="{{ route('user.site.update', $user['Id']) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="Id" value="{{$user['Id']}}">
                            <input type="hidden" name="site_id" value="{{$user['site_id']}}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('site_name') ? 'has-error' : '' }}">
                                        <label for="nome">Site Name</label>
                                        <input type="text" name="site_name" class="form-control" maxlength="30" minlength="4" placeholder="Name" required="" value="{{ $user['site_name'] }}" autofocus>
                                        @if($errors->has('site_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('site_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('site_url') ? 'has-error' : '' }}">
                                        <label for="nome">Site Url</label>
                                        <input type="text" name="site_url" class="form-control" maxlength="30" minlength="4" placeholder="Name" required="" value="{{ $user['site_url'] }}" autofocus>
                                        @if($errors->has('site_url'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('site_url') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('site_phone') ? 'has-error' : '' }}">
                                        <label for="nome">Site Phone</label>
                                        <input type="text" name="site_phone" class="form-control" placeholder="E-mail" required="" value="{{$user['site_phone']}}">
                                        @if($errors->has('site_phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('site_phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-save"></i> Save</button>
                            </div>
                        </form>
    				</div>
    			</div>
    		</div>
    	</div>    
    @endif

@endsection

@section('layout_js')    

    <script> 
        $(function(){             
            $('.select2').select2({
                "language": {
                    "noResults": function(){
                        return "No records found.";
                    }
                }
            });
            
            $('#icheck').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue'
            });
        }); 

    </script>

@endsection