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
		<a class="
			list-group-item
			{{ Request::segment(1) === 'material' ? 'active' : null }}
		" href="/material" data-toggle="tooltip" data-placement="bottom" title="Patients">
			<i class="las la-user-injured la-lw"></i><span>Materials</span>
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
		<a class="
			list-group-item
			{{ Request::segment(1) === 'asking-job' ? 'active' : null }}
		" href="/asking-job" data-toggle="tooltip" data-placement="bottom" title="Asking Jobs">
			<i class="las la-user-injured la-lw"></i>
			<span>Asking Jobs</span>
		</a>
		@endif
		<hr class="divider"/>
		<a class="list-group-item {{ Request::segment(1) === 'setting' ? 'active' : null }}" href="{{route('setting')}}" data-toggle="tooltip" data-placement="bottom" title="Settings">
            <i class="las la-cogs la-lw"></i>
            <span>settings</span>
          </a>
	</ul>
</div>