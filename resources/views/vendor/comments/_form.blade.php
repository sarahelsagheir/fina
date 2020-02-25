
<style>
    input.mr-5::placeholder{
        font-size: 13px;
}
</style>

    <div class="comment">
        @if($errors->has('commentable_type'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->get('commentable_type') }}
            </div>
        @endif
        @if($errors->has('commentable_id'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->get('commentable_id') }}
            </div>
        @endif
        <form method="POST" action="{{ url('comments') }}" class="form-inline">
            @csrf
            @honeypot
            <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
            <input type="hidden" name="commentable_id" value="{{ $model->id }}" />

            {{-- Guest commenting --}}
            @if(isset($guest_commenting) and $guest_commenting == true)
                <div class="form-group">
                    <label for="message">Enter your name here:</label>
                    <input type="text" class="form-control @if($errors->has('guest_name')) is-invalid @endif" name="guest_name" />
                    @error('guest_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="message">Enter your email here:</label>
                    <input type="email" class="form-control @if($errors->has('guest_email')) is-invalid @endif" name="guest_email" />
                    @error('guest_email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @endif
          
            <div class="form-group">
                <input style=" border:none; border-bottom:1px solid #ccc ;border-radius:0;" class="mr-5 py-4 form-control @if($errors->has('message')) is-invalid @endif" name="message" placeholder="Leave a comment" autocomplete="off"></input>
                <div class="invalid-feedback">
                    Your message is required.
                </div>
            </div>
            <button type="submit" class="btn btn-sm text-uppercase" style="border-radius: 50%" ><i class="fa fa-comment" aria-hidden="true"></i></button>

          
        </form>
    </div>
<br />