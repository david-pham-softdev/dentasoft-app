@extends('layouts.AdminLTE.index')

@section('icon_page', 'eye')

@section('title', 'View User')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('user') }}" class="link_menu_page">
			<i class="fa fa-user"></i> Users
		</a>								
	</li>

@endsection

@section('content')
    @if (!empty($user))    
        <div class="box box-primary">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-12">	
    					<div class="col-lg-3 text-center">
                            <br>
                            @if(file_exists(isset($user['avatar'])))
                              <img src="{{ asset($user->avatar) }}" class="profile-user-img img-responsive img-circle">
                            @else
                              <img src="{{ asset('img/config/nopic.png') }}" class="profile-user-img img-responsive img-circle">
                            @endif
                            <h3 class="profile-username text-center">
                                {{ $user['FirstName']. ' '. $user['LastName'] }}    
                            </h3>                        
                            @if($user['Status'] === 'Active')
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">Inactive</span>
                            @endif                        
                        </div>
                        <div class="col-lg-9">
                            <div class="attachment row">
                                <div class="col-lg-6">
                                    <h4><b>E-mail: </b></h4>
                                    <span>{{ $user['Email'] ?? 'N/A' }}</span>
                                    <h4><b>Phone: </b></h4>
                                    <span>{{ $user['Phone'] ?? 'N/A' }}</span>
                                    <h4><b>Role</b></h4>
                                    <span class="label label-primary">{{ $user['Role'] ?? 'N/A' }}</span>
                                </div>
                                <div class="col-lg-6">
                                    <h4><b>Company Code: </b></h4>
                                    <span>{{ $user['company_code'] ?? 'N/A' }}</span>
                                    <h4><b>Site Name: </b></h4>
                                    <span>{{ !empty($user['site_name']) ? $user['site_name'] : 'N/A' }}</span>
                                    <h4><b>Site Url: </b></h4>
                                    <span>{{ !empty($user['site_phone']) ? $user['site_phone'] : 'N/A' }}</span>
                                    <h4><b>Site Phone: </b></h4>
                                    <span>{{ !empty($user['site_phone']) ? $user['site_phone']  : 'N/A' }}</span>
                                    <br>
                                    <br>
                                    <a href="{{ route('user.site.edit', $user['Id']) }}" title="Edit {{ $user['FirstName']. ' '. $user['LastName'] }}"><button type="button" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit Site</button></a>
                                </div>
                                
                                <div class="col-lg-12 pull-right"> 
                                    <br>
                                    <br>
                                    @if($user['Email_Verify'] !== "true")                           
                                    <a href="/user/code-verify?email={{$user['Email']}}" title="Code Verify {{ $user['FirstName']. ' '. $user['LastName'] }}"><button type="button" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-key"></i> Code Verify</button></a>
                                    @endif
                                    <a href="{{ route('user.edit', $user['Id']) }}" title="Edit {{ $user['FirstName']. ' '. $user['LastName'] }}"><button type="button" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit</button></a>
                                </div>
                            </div>
                        </div>
    				</div>
    			</div>
    		</div>
    	</div>    
    @endif
@endsection