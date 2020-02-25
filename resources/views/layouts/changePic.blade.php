<div id="changePic" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <p style="display:none">

        </p>
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <div class="register-form">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- @if(session()->get('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>SUCESS &nbsp;</strong> {{session()->get('success')}}
                        </div>
                        @endif -->
                        <form enctype="multipart/form-data" action="{{route('profileAvatar')}}" method="post">

                            <div class="group-input">
                                <div style="border:1px solid #ccc;">
                                    <input type="file" name="cover" style="opacity:0" class="form-control">
                                </div>

                                <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">

                            </div>

                            <button type="submit" class="btn register-btn">Upload Picture </button>
                        </form>
                    </div>
            </div>
        </div>

    </div>

</div>