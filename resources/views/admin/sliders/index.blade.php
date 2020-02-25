@extends('layouts.backend')

@section('content')

    <div class="app-title">
        <div class="mb-2">
            <h1><i class="fa fa-sliders"></i> Slider</h1>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-dashboard fa-lg"></i></li>
            <li class="breadcrumb-item">Slider</li>
            <li class="breadcrumb-item"><a href="{{ route('slider.create') }}">Add</a></li>
        </ul>
    </div>

	<div class="row">
	    <div class="col-md-12">
	        <div class="tile">
	            <div class="tile-body">
	                <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
	                    <div class="row">
	                        <div class="col-sm-12">
	                        	<form action="delete/slider" method="POST">
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
			                                        <th>Slider</th>
			                                        <th>Title</th>
			                                        <th>Updated</th>
			                                    </tr>
			                                </thead>
			                                <tbody>
			                                	@if($sliders)
			                                		@foreach($sliders as $slider)
					                                    <tr>
					                                        <td>
					                                          <div class="animated-checkbox">
					                                              <label>
					                                                  <input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$slider->id}}">
					                                                  <span class="label-text"></span>
					                                              </label>
					                                          </div>
					                                        </td>
					                                        <td style="max-width: 200px; max-height: 100px"><img src="{{ $slider->banner }}" style="width: 100px; height:100px"></td>
					                                        <td>{{ $slider->title }} </td>
					                                        <td>{{ $slider->updated_at->diffForHumans() }}</td>
					                                    </tr>
					                                @endforeach
			                                    @endif
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