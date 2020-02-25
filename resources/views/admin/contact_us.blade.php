@extends('layouts.backend')

@section('content')

<div class="app-title">
    <div>
        <h1><i class="fa fa-book"></i>Contact us</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">


                    <div class="row">
                        <div class="col-sm-12">
                        <form action="delete/messages" method="POST">
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
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>created_at</th>
                                        <th>updated_at</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($messages)
                                    @foreach($messages as $message)
                                    <tr>	
                                        <td>
													<div class="animated-checkbox">
														<label>
															<input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$message->id}}">
															<span class="label-text"></span>
														</label>
													</div>
										</td>
                                        <td>{{ $message->id }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->msg }}Tk.</td>
                                        <td>{{ $message->created_at->diffForHumans() }}</td>
                                        <td>{{ $message->updated_at->diffForHumans() }}</td>
                                       
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                         </form>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info">{{$messages->links()}}</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate">
                                {{ $messages->render() }}
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