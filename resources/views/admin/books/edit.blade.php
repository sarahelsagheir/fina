@extends('layouts.backend')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Edit book</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item fa-lg"><a href="{{ route('book.index') }}">Back</a></li>
        </ul>
    </div>


	<div class="row">
	    <div class="col-md-12">
	        <div class="tile">
	            <div class="tile-body">
            		@include('includes.form-error')

        			{!! Form::model($book, ['method'=>'PATCH', 'action'=>['Admin\AdminBooksController@update', $book->id], 'files'=>true]) !!}
	                    <div class="mb-3">
	                        <div class="form-group">
	                            {!! Html::decode(Form::label('title','Title: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                              	{!! Form::text('title', null, ['class'=>'form-control','required' => 'required']) !!}
	                        </div>
	                    </div>

	                    <div class="row">
	                         <div class="col-md-3 mb-3">
	                            <div class="form-group">
	                                {!! Html::decode(Form::label('author','Author: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
									{!! Form::text('author', null, ['class'=>'form-control','required' => 'required']) !!}
	                            </div>
							</div>
							<div class="col-md-3 mb-3">
	                            <div class="form-group">
	                                {!! Html::decode(Form::label('quantity','Quantity: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
									{!! Form::text('quantity', null, ['class'=>'form-control','required' => 'required']) !!}
	                            </div>
							</div>
	                        <div class="col-md-3 mb-3">
	                            <div class="form-group">
	                                {!! Html::decode(Form::label('category','Category: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                                {!! Form::select('category_id', $categories, null, ['class'=>'select form-control', 'required' => 'required']) !!}
	                            </div>

	                        </div>
	                        <div class="col-md-3 mb-3">
	                            <div class="form-group">
		                            {!! Html::decode(Form::label('price','Price: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                              	{!! Form::text('price', null, ['class'=>'form-control','required' => 'required']) !!}
	                            </div>

	                        </div>
	                    </div>

	                    <div class="mb-3">
	                          <div class="form-group">
                              		{!! Html::decode(Form::label('description','Description: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                                {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3]) !!}
	                          </div>
	                    </div>
	                    <div class="row">
							<div class="col-md-6 mb-3">
								<div class="form-group">
									<label class="col-form-label">Cover Page</label>
									<div class="input-group mb-3">
										{!! Form::file('cover', ['class'=>'form-control']) !!}
										<div class="input-group-append">
											<span class="input-group-text" id="cover-page">Preview</span>
										</div>
									</div>
								</div>
							</div>

	                    </div>

	                    <hr class="mb-4">
	                    {!! Form::submit('Update book', ['class'=>'btn btn-primary btn-md mb-5']) !!}

	                {{ Form::close() }}
	            </div>
	        </div>
	    </div>
	</div>

@endsection



@section('scripts')
	@include('includes.tinyeditor')
   
    <script>
		$('#cover-page').click(function(){
			Swal.fire({
				imageUrl: ' {{$book->cover}}',
				imageAlt: 'Cover Page',
				customClass: {
				confirmButton: 'btn btn-primary btn-lg'
				},
				buttonsStyling: false
			});
		});

	

    </script>
@endsection