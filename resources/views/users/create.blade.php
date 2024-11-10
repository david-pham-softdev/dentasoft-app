@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Add User')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('user') }}" class="link_menu_page">
			<i class="fa fa-user"></i> Users
		</a>
	</li>

@endsection

@section('content')

    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					 <form action="{{ route('user.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('firstName') ? 'has-error' : '' }}">
                                    <label for="nome">First Name</label>
                                    <input type="text" name="firstName" class="form-control" maxlength="30" minlength="4" placeholder="Name" required="" value="{{ old('name') }}" autofocus>
                                    @if($errors->has('firstName'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('firstName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('lastName') ? 'has-error' : '' }}">
                                    <label for="nome">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" maxlength="30" minlength="4" placeholder="Name" required="" value="{{ old('name') }}" autofocus>
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
                                    <input type="email" name="email" class="form-control" placeholder="E-mail" required="" value="{{ old('email') }}">
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
                                    <input type="password" name="password" class="form-control" placeholder="Password" minlength="6" required="">
                                    @if($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('password-confirm') ? 'has-error' : '' }}">
                                    <label for="nome">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" minlength="6" required="">
                                    @if($errors->has('password-confirm'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password-confirm') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label for="nome">Phone</label>
                                    <input type="phone" name="phone" class="form-control" placeholder="Phone" required="" value="{{ old('phone') }}">
                                    @if($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                                    <label for="nome">Role</label>
                                    <input type="text" name="role" class="form-control" placeholder="Role" required="" value="{{ old('role') }}">
                                    @if($errors->has('role'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('site_url') ? 'has-error' : '' }}">
                                    <label for="nome">Site Url</label>
                                    <input type="text" name="site_url" class="form-control" placeholder="Site Url" required="" value="{{ old('site_url') }}">
                                    @if($errors->has('site_url'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('site_url') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('site_email') ? 'has-error' : '' }}">
                                    <label for="nome">Site Email</label>
                                    <input type="text" name="site_email" class="form-control" placeholder="Site Email" required="" value="{{ old('site_email') }}">
                                    @if($errors->has('site_email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('site_email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> -->

                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('site_phone') ? 'has-error' : '' }}">
                                    <label for="nome">Site Phone</label>
                                    <input type="text" name="site_phone" class="form-control" placeholder="Site Phone" required="" value="{{ old('site_phone') }}">
                                    @if($errors->has('site_phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('site_phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('site_name') ? 'has-error' : '' }}">
                                    <label for="nome">Site Name</label>
                                    <input type="text" name="site_name" class="form-control" placeholder="Site Name" required="" value="{{ old('site_name') }}">
                                    @if($errors->has('site_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('site_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('language') ? 'has-error' : '' }}">
                                    <label for="nome">Language</label>
                                    <input type="text" name="language" class="form-control" placeholder="Language" required="" value="{{ old('language') }}">
                                    @if($errors->has('language'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('language') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('company_code') ? 'has-error' : '' }}">
                                    <label for="nome">Company Code</label>
                                    <input type="text" name="company_code" class="form-control" placeholder="Company Code" required="" value="{{ old('company_code') }}">
                                    @if($errors->has('company_code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- <div class="col-lg-12">
                                <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                                    <label for="nome">Permission Group</label>
                                    <select name="roles[]" class="form-control select2" multiple="multiple" data-placeholder="Permission Group" required="">
                                        @foreach($roles as $role)
                                            @if($role->id != 1)
                                                <option value="{{ $role->id}}"> {{ $role->name}} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('roles'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('roles') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> -->
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                               <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> Add</button>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('layout_js')

    <script>
        $(function(){
            $('.select2').select2({
                "language": {
                    "noResults": function(){
                        return "Nenhum registro encontrado.";
                    }
                }
            });
        });

    </script>

@endsection
