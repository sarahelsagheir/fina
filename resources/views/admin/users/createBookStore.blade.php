@extends('layouts.backend')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-users"></i> Add New BookStore</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-dashboard fa-lg"></i></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item"><a href="{{ route('users.create') }}">Add</a></li>
        </ul>
    </div>


	<div class="row">
	    <div class="col-md-12">
	        <div class="tile">
	            <div class="tile-body">
            		@include('includes.form-error')
					  @if(Session::has('store_added'))
					    <div class="alert alert-success" role="alert">
					      {{session('store_added')}}
					    </div>
					  @endif

	                {!! Form::open(['action'=>'Admin\AdminUserController@store', 'files'=>true]) !!}
	                    <div class="mb-3">
	                        <div class="form-group">
	                            {!! Html::decode(Form::label('name','Name: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                              	{!! Form::text('name', null, ['class'=>'form-control','required' => 'required']) !!}
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-md-5 mb-3">
	                            <div class="form-group">
	                                {!! Html::decode(Form::label('email','Email: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
									{!! Form::email('email', null, ['class'=>'form-control','required' => 'required']) !!}
	                            </div>
	                        </div>

	                        <div class=" mt-4 col-md-5">
	                            <div class="form-group">
		                            {!! Html::decode(Form::label('password','password: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                              	{!! Form::password('password', null, ['class'=>'form-control','required' => 'required']) !!}
	                            </div>

							</div>
						
	                    </div>
	                 
	                    <div class="row">
	                        <div class="col-md-6 mb-3">
	                          <div class="form-group">
									{!! Html::decode(Form::label('cover','Cover: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                                {!! Form::file('cover', ['class'=>'form-control', 'required' => 'required']) !!}
	                          </div>

	                        </div>
	                    

	                    <hr class="mb-4">
	                    {!! Form::submit('Add New BookStore', ['class'=>'btn btn-primary btn-md mb-5']) !!}

	                {{ Form::close() }}
	            </div>
	        </div>
	    </div>
	</div>

@endsection

