@if(\App\Models\Config::find(1)->register != 'T')
    @php
        header("Location: /");
        exit();
    @endphp
@endif

@section('title', 'Register')
@section('layout_css')
    <style>
        #box-login-personalize{
            width: 360px;
            margin: 3% auto;
        }
    </style>
@stop

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        @include('layouts.AdminLTE._includes._head')

    </head>
    <body class="hold-transition login-page">
        <div id="box-login-personalize">
            <div class="login-logo">

                @if(\App\Models\Config::find(1)->img_login == 'T')
                    <img src="{{ asset(\App\Models\Config::find(1)->caminho_img_login) }}" width="{{ \App\Models\Config::find(1)->tamanho_img_login }}%"/>
                    <br/>
                @endif

                {!! \App\Models\Config::find(1)->titulo_login !!}
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Register a new membership</p>
                <form  method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group has-feedback">
                        <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}" required="" AUTOCOMPLETE='off'>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <br/>
                            <span class="help-block">
                                <strong><p class="text-red">{{ $errors->first('email') }}</p></strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <input id="first_name" type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" autofocus required="" AUTOCOMPLETE='off'>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong><p class="text-red">{{ $errors->first('first_name') }}</p></strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <input id="last_name" type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" autofocus required="" AUTOCOMPLETE='off'>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong><p class="text-red">{{ $errors->first('last_name') }}</p></strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                        <input id="phone_number" type="text" class="form-control" placeholder="Mobile Number" name="phone_number" value="{{ old('phone_number') }}" autofocus required="" AUTOCOMPLETE='off' minlength="10" maxlength="10">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('phone_number'))
                            <span class="help-block">
                                <strong><p class="text-red">{{ $errors->first('phone_number') }}</p></strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                        <input id="password" type="password" class="form-control" placeholder="Password" name="password" required="" AUTOCOMPLETE='off'>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input id="confirm-password" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required="" AUTOCOMPLETE='off'>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong><p class="text-red">{{ $errors->first('password') }}</p></strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <input id="code_elab" type="text" class="form-control" placeholder="Code Elab" name="code_elab" value="{{ old('code_elab') }}" autofocus required="" AUTOCOMPLETE='off'>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('code_elab'))
                            <span class="help-block">
                                <strong><p class="text-red">{{ $errors->first('code_elab') }}</p></strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- <label for="nome">Client Type</label> -->
                        <select name="role" class="form-control" data-placeholder="Client Type" required="">
                            <option value=""> Select </option>
                            <option value="Dentist"> Dentist </option>
                            <option value="Lab"> Laboratoire </option>
                        </select>
                        @if($errors->has('role'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                        </div>
                        <br/><br/><br/>
                        <div class="col-xs-12">
                            <center>
                                <a href="{{ route('login') }}">Login</a>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @include('layouts.AdminLTE._includes._script_footer')

    </body>
</html>
