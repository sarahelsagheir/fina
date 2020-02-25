@extends('layouts.backend')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-book"></i>Result</h1>
    </div>

    <form method="POST" action="{{url('admin/search')}}">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" id="q" name="q" class="form-control" placeholder="Search Books" value="{{ old('search') }}">
                        </div>
                        <div class="col-md-6">
                            @csrf

                            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
          
		
                <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
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
                                                @if($books->count())
                                                @foreach($books as $book)
                                                <td>
                                                    <div class="animated-checkbox">
                                                        <label>
                                                            <input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$book->id}}">
                                                            <span class="label-text"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td> {{ $book->title }}</td>
                                                <td> {{ $book->price }}</td>
                                                <td> {{ $book->category->title }}</td>
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

