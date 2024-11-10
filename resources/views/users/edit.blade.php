@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Edit User')

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
    					 <form action="{{ route('user.update') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="Id" value="{{$user['Id']}}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('firstName') ? 'has-error' : '' }}">
                                        <label for="nome">First Name</label>
                                        <input type="text" name="firstName" class="form-control" maxlength="30" minlength="4" placeholder="Name" required="" value="{{ $user['FirstName'] }}" autofocus>
                                        @if($errors->has('firstName'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('firstName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('lastName') ? 'has-error' : '' }}">
                                        <label for="nome">Last Name</label>
                                        <input type="text" name="lastName" class="form-control" maxlength="30" minlength="4" placeholder="Name" required="" value="{{ $user['LastName'] }}" autofocus>
                                        @if($errors->has('lastName'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label for="nome">E-mail</label>
                                        <input type="email" name="email" class="form-control" placeholder="E-mail" required="" value="{{$user['Email']}}">
                                        @if($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label for="nome">Password</label>
                                        <input type="text" name="password" class="form-control" placeholder="Password" minlength="6" required="" value="{{$user['password']}}">
                                        @if($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                        <label for="nome">Phone</label>
                                        <input type="phone" name="phone" class="form-control" placeholder="Phone" required="" value="{{ $user['Phone'] }}">
                                        @if($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
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