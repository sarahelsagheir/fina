@extends('layouts.backend')

@section('content')
        <div class="app-title">
            <div>
                <h1><i class="fa fa-sliders"></i> Add Slider</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-dashboard fa-lg"></i></li>
                <li class="breadcrumb-item">Slider</li>
                <li class="breadcrumb-item"><a href="{{ route('slider.create') }}">Add</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
						  @if(Session::has('slider_added'))
						    <div class="alert alert-success" role="alert">
						      {{session('slider_added')}}
						    </div>
						  @endif
		                {!! Form::open(['action'=>'Admin\AdminSlidersController@store', 'files'=>true]) !!}
		                    <div class="mb-3">
		                        <div class="form-group">
		                            {!! Html::decode(Form::label('title','Title: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                              	{!! Form::text('title', null, ['class'=>'form-control','required' => 'required']) !!}
		                        </div>
								<div class="form-group">
									{!! Html::decode(Form::label('banner','Banner: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
									{!! Form::file('banner', ['class'=>'form-control','required' => 'required']) !!}
								</div>
		                    </div>
	                    	{!! Form::submit('Add Slider', ['class'=>'btn btn-primary btn-md mb-5']) !!}

	                	{!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
	
@endsection