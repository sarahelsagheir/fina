@extends('layouts.backend')

@section('content')

    <div class="app-title">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-users fa-lg"></i></li>
            <li class="breadcrumb-item">Users</li>
        </ul>
    </div>

	<div class="row">
	    <div class="col-md-12">
	        <div class="tile">
	            <div class="tile-body">
	                <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
	                    <div class="row">
	                        <div class="col-sm-12">
	                        	<form action="delete/comment" method="POST">
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
			                                        <th>Join</th>
			                                    </tr>
			                                </thead>
			                                <tbody>
		                                		@foreach($comments as $comment)
				                                    <tr>
				                                        <td>
				                                          <div class="animated-checkbox">
				                                              <label>
				                                                  <input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$comment->id}}">
				                                                  <span class="label-text"></span>
				                                              </label>
				                                          </div>
				                                        </td>
				                                        <td> {{ $comment->user->name }}</td>
				                                        <td>{{ $comment->comment }} </td>
				                                        <td>{{ $comment->updated_at->diffForHumans() }}</td>
				                                    </tr>
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
		$(document).ready(function(){
			$('#check-all').click(function(){
				if(this.checked){
					$('.checkBoxes').each(function(){
						this.checked = true;
					});
				} 
				else{
					$('.checkBoxes').each(function(){
						this.checked = false;
					});
				}
			});
		});
	</script>
@endsection