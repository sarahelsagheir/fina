@extends('layouts.backend')

@section('content')




<form method="POST" action="{{route('order')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="order" id="search" class="form-control" placeholder="Search Order">
                        </div>
                        <div class="col-md-4">

                           <button class="btn btn-success">Search</button>
                        </div>
                    </div>
                </form>



@endsection