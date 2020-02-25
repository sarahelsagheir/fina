@extends('layouts.backend')

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-laptop fa-lg"></i></li>
    <li class="breadcrumb-item">Category</li>
    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category Section</a></li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        @if(Session::has('updated_category'))
        <div class="alert alert-success" role="alert">
          {{session('updated_category')}}
        </div>
        @endif

        <div class="row">
          <div class="col-md-4">
            {!! Form::open(['action'=>'Admin\AdminCategoriesController@store']) !!}
            <div class="mb-3">
              <div class="form-group">
                {!! Form::text('title', null, ['class'=>'form-control','required' => 'required', 'placeholder' => 'Title']) !!}
              </div>
            </div>
            {!! Form::submit('Add Category', ['class'=>'btn btn-primary btn-md mb-5']) !!}

            {!! Form::close() !!}
          </div>
          <div class="col-md-8">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @if($categories)
                @foreach($categories as $category)
                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->title}}</td>
                  <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update" data-title="{{ $category->title }}" data-id="{{ $category->id }}"><i class="fa fa-edit"></i></button>
                    <form action="{{route('category.destroy' ,$category->id)}}" method="POST" class="d-inline-block">
                      @csrf
                      @method('DELETE')

                      <input type="hidden" name="id" value="{{$category->id}}">
                      <button id="delteButton" class='btn btn-primary btn-sm ' onclick="return confirm('Are you sure?')"><span class='fa fa-trash delete'></span></button></form>

                    </form>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateCategory">
          @csrf
          <input type="hidden" name="id" value="" id="c_id">
          <div class="form-group">
            <label class="col-form-label">
              Title<span class="mustfillup">*</span>
            </label>
            <input type="text" name="title" value="" class="form-control" id="c_title" required="">
          </div>
          <button type="submit" class="btn btn-primary btn-md mb-3">Update Category</button>
        </form>

      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')

<script>
  $(document).on('submit', '#updateCategory', function(e) {

    event.preventDefault();

    var category_id = $('#c_id').val();

    $.ajax({
      type: "PATCH",
      url: "/admin/category/" + category_id,
      data: $("#updateCategory").serialize(),
      success: function(response) {
        $('#update').modal('hide');
        window.location.reload();
      },
      error: function(error) {
        alert(error);
      }
    });

  });

  $('#update').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipient = button.data('title');
    var data_id = button.data('id');
    $(this).find('.modal-body #c_title').val(recipient);
    $(this).find('.modal-body #c_id').val(data_id);
  });
</script>

@endsection