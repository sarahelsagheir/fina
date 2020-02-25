@extends('layouts.backend')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
          
		
                <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                        <form method="GET" action="user/search">
                        @csrf

			<div class="row">
				<div class="col-md-6">
					<input type="text" name="search" class="form-control" placeholder="Search users" value="{{ old('search') }}">
				</div>
				<div class="col-md-6">

					<button class="btn btn-success">Search</button>
				</div>
			</div>
		</form> 
                            <form action="" method="POST">
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
                                                <th>Title</th>
                                                <th>price</th>
                                                <th>Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                @foreach($users as $user)
                                                <td>
                                                    <div class="animated-checkbox">
                                                        <label>
                                                            <input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$user->id}}">
                                                            <span class="label-text"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td> {{ $user->name }}</td>
                                               <td></td>
                                               <td></td>
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
