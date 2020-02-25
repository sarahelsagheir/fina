@extends('layouts.backend')

@section('content')

<div class="app-title">
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-users fa-lg"></i></li>
		<li class="breadcrumb-item">Users</li>
	</ul>
	@include('includes.form-error')
	@if(Session::has('store_added'))
	<div class="alert alert-success" role="alert">
		{{session('store_added')}}
	</div>
	@endif
</div>

<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body">

				<div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
					<div class="row">
						<div class="col-sm-12">
							<form action="delete/users" method="POST">
								@csrf
								<div class="btn-group">
									<div class="animated-checkbox">
										<label>
											<input type="checkbox" id="check-all"><span class="label-text btn btn-dark"></span>
										</label>
									</div>
									<div class="form-group">
										<label>
											{{ Form::button('<i class="fa fa-trash"></i>', ['type'=> 'submit', 'class'=>'btn btn-danger ml-2']) }}
										</label>
									</div>
								</div>
								<div class="table-responsive-md">
									<table class="table table-hover table-bordered">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Email</th>
												<th>Role</th>
												<th>Is Ban?</th>
												<th>Action</th>
												<th>Join</th>
												<th>Updated</th>
											</tr>
										</thead>
										<tbody>
											@foreach($users as $user)
											@if($user->hasRole('admin')==false)

											<tr>
												<td>
													<div class="animated-checkbox">
														<label>
															<input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$user->id}}">
															<span class="label-text"></span>
														</label>
													</div>
												</td>
												<td> {{ $user->name }}</td>
												<td>{{ $user->email }} </td>
												<td>@if($user->hasRole('user'))
													user
													@else
													Book store
													@endif

												</td>
												<td>
													@if($user->isBanned())
													<label>Yes</label>
													@else
													<label>No</label>
													@endif
												</td>

												<td>

													@if($user->isbanned())
													<a href="{{ route('users.revoke', $user->id) }}" class="button is-light m-r-5"> Revoke</a>
													@else
													<a href="{{ route('users.ban', $user->id) }}" class="button  m-r-5"> Ban</a>
													@endif

												</td>
												<td>{{ $user->created_at->diffForHumans() }}</td>
												<td>{{ $user->updated_at->diffForHumans() }}</td>
											</tr>
											@endif

											@endforeach

										</tbody>
									</table>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection


@section('scripts')
<script>
	$(document).ready(function() {
		$('#check-all').click(function() {
			if (this.checked) {
				$('.checkBoxes').each(function() {
					this.checked = true;
				});
			} else {
				$('.checkBoxes').each(function() {
					this.checked = false;
				});
			}
		});
	});
</script>
@endsection