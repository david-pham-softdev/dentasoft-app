@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Code Verify')

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
					 <form action="{{ route('user.verify-code') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="email" value="{{$email}}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                                    <label for="nome">Code</label>
                                    <input type="text" name="code" class="form-control" maxlength="30" minlength="4" placeholder="Code" required="" value="{{ old('code') }}" autofocus>
                                    @if($errors->has('code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('company_code') ? 'has-error' : '' }}">
                                    <label for="nome">Company code</label>
                                    <input type="text" name="company_code" class="form-control" maxlength="30" minlength="4" placeholder="Company code" required="" value="{{ old('name') }}" autofocus>
                                    @if($errors->has('company_code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-fw fa-plus"></i> Submit</button>
                                </div>
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
