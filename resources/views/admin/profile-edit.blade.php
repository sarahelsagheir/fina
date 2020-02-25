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

		<div class="col-md-8 cart_info">
		    <h4 class="mb-3 mt-3">Edit Profile</h4>
    			{!! Form::model($user, ['method'=>'PATCH', 'action'=>['Admin\ProfileController@update', $user->id], 'files'=>true]) !!}
		        <div class="row">
		            <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {!! Html::decode(Form::label('name','Name: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                          	{!! Form::text('name', null, ['class'=>'form-control','required' => 'required']) !!}
                        </div>
		            </div>
		            <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {!! Html::decode(Form::label('email','Email: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                          	{!! Form::email('email', null, ['class'=>'form-control','required' => 'required']) !!}
                        </div>

		            </div>
		        </div>
		     
		     
		        <div class="mb-3">
              		<div class="form-group">
						{!! Html::decode(Form::label('profile_picture','Profile Picture: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                        {!! Form::file('avatar', ['class'=>'form-control']) !!}
                  </div>
		        </div>
		        <div class="mb-3">
                  	<div class="form-group">
						{!! Html::decode(Form::label('password','Password: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                        {!! Form::password('password', ['class'=>'form-control', 'required' => 'required']) !!}
                    </div>
		        </div>
                <hr class="mb-4">
                {!! Form::submit('Update Profile', ['class'=>'btn btn-primary btn-md mb-5']) !!}
		    {{ Form::close() }}
		</div>
	</div>

@endsection