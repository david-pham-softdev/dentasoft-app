@extends('layouts.AdminLTE.index')

@section('icon_page', 'user')

@section('title', 'Users')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('user.create') }}" class="link_menu_page">
			<i class="fa fa-plus"></i> Add
		</a>
	</li>
	<li role="presentation">
		<a href="{{ route('role') }}" class="link_menu_page">
			<i class="fa fa-unlock-alt"></i> Permissions
		</a>
	</li>

@endsection

@section('content')

    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table id="tabelapadrao" class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th>Name</th>
                                    <th>E-mail</th>
                                    <th>Company Code</th>
                                    <th>E-mail Verified</th>
									<th>Phone</th>
									<th>Role</th>
									<th class="text-center">Status</th>
{{--									<th class="text-center">Created</th>--}}
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
									@if (!empty($user) && $user['Email'] != 'david.pham.softdev@yopmail.com')
										<tr>
											<td>
												@if($user['Status'] === 'Active')
						                            <a herf="#" title="OnLine"><span class="text-green"><i class="fa fa-fw fa-circle"></i></span></a>
												@else
													<a herf="#" title="OffLine"><span class="text-red"><i class="fa fa-fw fa-circle"></i></span></a>
						                        @endif
												{{ $user['FirstName']. ' '. $user['LastName'] }}
											</td>
											<td>{{ $user['Email'] }}</td>
											<td>{{ $user['company_code'] }}</td>
											<td class="text-center">
												@if($user['Email_Verify'] === "true")
													<span class="label label-success">Yes</span>
												@else
													<span class="label label-danger">No</span>
												@endif
											</td>
                                            <td>{{ $user['Phone'] }}</td>
                                            <td class="text-right">
												<span class="label label-warning">{{ $user['Role'] }}</span>
												<a class="btn btn-primary  btn-xs" href="#" title="Delete {{ $user['FirstName']. ' '. $user['LastName']}}" data-toggle="modal" data-target="#modal-change-role-{{ $user['Id'] }}"><i class="fa fa-pencil"></i></a>
											</td>
											<td class="text-right">
												@if($user['Status'] === 'Active')
													<span class="label label-success">Active</span>
												@else
													<span class="label label-danger">Inactive</span>
												@endif
												<a class="btn btn-primary  btn-xs" href="#" title="Delete {{ $user['FirstName']. ' '. $user['LastName']}}" data-toggle="modal" data-target="#modal-change-status-{{ $user['Id'] }}"><i class="fa fa-pencil"></i></a>
											</td>
{{--											<td class="text-center">{{ $user->created_at->format('d/m/Y H:i') }}</td>--}}
											<td class="text-right">
												@if($user['Email_Verify'] !== "true")
												 	<a class="btn btn-primary  btn-xs" href="/user/resend-verify-code?email={{$user['Email']}}" title="Resend Verify Code {{ $user['FirstName']. ' '. $user['LastName'] }}"><i class="fa fa-key"></i></a>
												 @endif
												 <a class="btn btn-default  btn-xs" href="{{ route('user.show', $user['Id']) }}" title="See {{ $user['FirstName']. ' '. $user['LastName'] }}"><i class="fa fa-eye">   </i></a>
												 <a class="btn btn-warning  btn-xs" href="{{ route('user.edit', $user['Id']) }}" title="Edit {{ $user['FirstName']. ' '. $user['LastName'] }}"><i class="fa fa-pencil"></i></a>
												 <a class="btn btn-danger  btn-xs" href="#" title="Delete {{ $user['FirstName']. ' '. $user['LastName']}}" data-toggle="modal" data-target="#modal-delete-{{ $user['Id'] }}"><i class="fa fa-trash"></i></a>
{{--												 @if (Auth::user()->can('root-dev', ''))--}}
{{--												 	<a class="btn btn-info  btn-xs" href="{{ route('impersonate', $user['Id']) }}" title="Impersonate user"><i class="fa fa-user"></i></a>--}}
{{--												 @endif--}}
											</td>
										</tr>
										<div class="modal fade" id="modal-delete-{{ $user['Id'] }}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<h4 class="modal-title"><i class="fa fa-warning"></i> Caution!!</h4>
													</div>
													<div class="modal-body">
														<p>Do you really want to delete ({{ $user['FirstName']. ' '. $user['LastName'] }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
														<a href="{{ route('user.destroy', [$user['Email'], $user['company_code']]) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
													</div>
												</div>
											</div>
										</div>

										<div class="modal fade" id="modal-change-status-{{ $user['Id'] }}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<h4 class="modal-title"><i class="fa fa-warning"></i> Caution!!</h4>
													</div>
													<div class="modal-body">
														<p>Do you really want to Change Status ({{ $user['FirstName']. ' '. $user['LastName'] }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
														<a href="{{ route('user.update.status', $user['Id']) }}"><button type="button" class="btn btn-primary">Change</button></a>
													</div>
												</div>
											</div>
										</div>

										<div class="modal fade" id="modal-change-role-{{ $user['Id'] }}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<h4 class="modal-title"><i class="fa fa-warning"></i> Caution!!</h4>
													</div>
													<div class="modal-body">
														<p>Do you really want to Change Role ({{ $user['FirstName']. ' '. $user['LastName'] }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
														<a href="{{ route('user.update.role', $user['Id']) }}"><button type="button" class="btn btn-primary">Change</button></a>
													</div>
												</div>
											</div>
										</div>
									@endif
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>Name</th>
									<th>E-mail</th>
									<th class="text-center">Status</th>
									<th class="text-center">Created</th>
									<th class="text-center">Actions</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
{{--				<div class="col-md-12 text-center">--}}
{{--					{{ $users->links() }}--}}
{{--				</div>--}}
			</div>
		</div>
	</div>

@endsection
