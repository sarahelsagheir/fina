<div id="changePas" class="modal fade" role="dialog">
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
                    <form action="{{route('changePassword')}}" method="post">
                        @csrf
                        <div class="group-input">
                            <label for="current_password"><strong>Current Password:</strong></label>
                            <input type="password" class="form-control" id="current_password" name="current_password">

                        </div>
                        <div class="group-input">
                            <label for="new_password"><strong>New Password:</strong></label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                        </div>
                        <div class="group-input">
                            <label for="confirm_password"><strong>Confirm New Password:</strong></label>
                            <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password">
                        </div>
                        <button type="submit" class="btn register-btn">Change Password</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>



