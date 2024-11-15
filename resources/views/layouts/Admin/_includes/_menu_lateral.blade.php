<div class="side-nav">
	<ul class="list-group list-group-flush">
		<a class="
			list-group-item
			{{ Request::segment(1) === null ? 'active' : null }}
			{{ Request::segment(1) === 'home' ? 'active' : null }}
		" href="/" data-toggle="tooltip" data-placement="bottom" title="Dashboard"><i class="las la-shapes la-lw"></i><span>dashboard</span></a>
		@if((Auth::user()->can('root-admin', '')))
		<a class="
			list-group-item
			{{ Request::segment(1) === 'user' ? 'active' : null }}
		" href="/user" data-toggle="tooltip" data-placement="bottom" title="Patients">
			<i class="las la-user-injured la-lw"></i><span>Users</span>
		</a>
		@endif
		<a class="
			list-group-item
			{{ Request::segment(1) === 'patient' ? 'active' : null }}
		" href="/patient" data-toggle="tooltip" data-placement="bottom" title="Patients">
			<i class="las la-user-injured la-lw"></i><span>patients</span>
		</a>
		@if((Auth::user()->can('root-dentist', '') || Auth::user()->can('root-lab', '')))
		<a class="
			list-group-item
			{{ Request::segment(1) === 'laboratory' ? 'active' : null }}
		" href="/laboratory" data-toggle="tooltip" data-placement="bottom" title="Laboratories">
			<i class="las la-user-injured la-lw"></i>
			<span>Laboratories</span>
		</a>
		@endif
		<hr class="divider"/>
	</ul>
</div>