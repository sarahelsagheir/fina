@extends('layouts.backend')

@section('content')

<div class="app-title">
    <div>
        <h1><i class="fa fa-book"></i> Book</h1>
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

                    @if(Session::has('book_updated'))
                    <div class="alert alert-success" role="alert">
                        {{session('book_updated')}}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-12">
                            <form action="delete/book" method="POST">
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
                                            <th>Cover</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                            <th>Createor</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($books)
                                        @foreach($books as $book)
                                        @if($book->quantity)
                                        <tr>
                                            <td>
                                                <div class="animated-checkbox">
                                                    <label>
                                                        <input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$book->id}}">
                                                        <span class="label-text"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $book->id }}</td>
                                            <td style="max-width: 200px; max-height: 100px"><img src="{{ $book->cover }}" style="width: 100px; height:100px"></td>
                                            <td><a href="#">{{ $book->title }}</a></td>
                                            <td><a href="#">{{ $book->author }}</a></td>
                                            <td>
                                                @if( $book->price ==0)Free
                                            @else
                                            {{ $book->price }} L.E 
                                            @endif
                                            </td>
                                            <td>@if( $book->status==1) Avaliable
                                                @else Unavaliable
                                            @endif</td>
                                            
                                            <td>-</td>
                                            <td>{{ $book->user->name }}</td>
                                            <td>{{ $book->created_at->diffForHumans() }}</td>
                                            <td>{{ $book->updated_at->diffForHumans() }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="{{ route('book.edit', $book->id) }}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-primary btn-sm" href="{{ route('book.show', $book->id) }}"><i class="fa fa-eye"></i></a>
                                                <form action="{{route('book.destroy' ,$book->id)}}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')

                                                    <input type="hidden" name="id" value="{{$book->id}}">
                                                    <button id="delteButton" class='btn btn-primary btn-sm ' onclick="return confirm('Are you sure?')"><span class='fa fa-trash delete'></span></button></form>

                            </form>
                            </td>
                            </tr>
                            @endif
                            @endforeach
                            @endif
                            </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info">{{$books->links()}}</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate">
                                {{ $books->render() }}
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