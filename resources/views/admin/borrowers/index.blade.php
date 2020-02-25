@extends('layouts.backend')

@section('content')

<div class="app-title">
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-users fa-lg"></i></li>
		<li class="breadcrumb-item">Borrwers</li>
	</ul>

</div>

<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body">

				<div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
					<div class="row">
						<div class="col-sm-12">
					
								<div class="table-responsive-md">
									<table class="table table-hover table-bordered">
										<thead>
											<tr>
                                                <th></th>
												<th>#</th>
												<th>Name</th>
												<th>Email</th>
												<th>Book title</th>
												<th>Book status</th>
												<th>Join</th>
											</tr>
										</thead>
										<tbody>
											@foreach($borrowers as $borrower)

											<tr  @if ($borrower->status() != '1') class="text-success" @else class="text-danger" @endif>
												<td>
													<div class="animated-checkbox">
														<label>
															<span class="label-text"></span>
														</label>
													</div>
												</td>
												<td> {{ $borrower->id }}</td>
												<td> {{ $borrower->user->name }}</td>
												<td>{{ $borrower->user->email }} </td>
												<td> {{$borrower->book->title}}</td>

												<td> {{$borrower->status()}} Days Left 
											    	@if(($borrower->status())<=3)
												     	<form action="{{ url('admin/sms') }}" method="POST" class="d-inline-block ml-2">
												         	@csrf
													     	<button class="btn btn-danger">SMS</button>
												       </form>
												 @endif
												</td>
												
												<td>{{ $borrower->created_at->diffForHumans() }}</td>
											
											</tr>

											@endforeach

										</tbody>
									</table>
								</div>
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