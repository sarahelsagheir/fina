@extends('layouts.backend')

@section('content')

<div class="row">
	<div class="col-md-3">
		<div class="card">
			<div class="card-body">
				<img src="{{$user->avatar =='/customers/' ? 'https://image.ibb.co/jw55Ex/def_face.jpg' : $user->avatar}}" class="rounded-circle f-profile-pic"/>
			</div>
		</div>
	</div>

	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between"><h4>Profile</h4></li>
					<li class="list-group-item d-flex justify-content-between ">Name<span>{{ $user->name }}</span></li>
					<li class="list-group-item d-flex justify-content-between ">Email<span>{{ $user->email }}</span></li>
				
				</ul>
		        <div class="d-print-none mt-2">
		            <div class="text-right"><a class="btn btn-primary" href="{{ route('profile.edit', $user->id) }}"><i class="fa fa-edit"></i> Edit</a></div>
		        </div>
			</div>
		</div>
	</div>
</div>
@endsection