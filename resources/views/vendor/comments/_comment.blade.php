@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))
@if(isset($reply) && $reply === true)
  <div id="comment-{{ $comment->id }}" class="media my-2">
@else
  <li id="comment-{{ $comment->id }}" class="media my-2">
@endif
    <img class="mr-3" src="{{asset($comment->commenter->cover ?? $comment->guest_email)}}" style="vertical-align: middle;width: 40px; height: 40px;border-radius: 50%;" alt="avatar">
    <div class="media-body">
        <h5 class="mt-2 mb-1 text-capitalize">{{ $comment->commenter->name ?? $comment->guest_name }} <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small></h5>
        <div style="white-space: pre-wrap;">{!! $markdown->line($comment->comment) !!}</div>

        <div class="mt-3">
            @can('reply-to-comment', $comment)
                <a data-toggle="modal" data-target="#reply-modal-{{ $comment->id }}" style="color: #074958 ; cursor:pointer" class="btn-sm btn-link text-uppercase">Reply</a>
            @endcan
            @can('edit-comment', $comment)
                <a data-toggle="modal" data-target="#comment-modal-{{ $comment->id }}" style="color: #074958 ; cursor:pointer" class="btn-link text-uppercase">Edit</a>
            @endcan
            @can('delete-comment', $comment)
                <a href="{{ url('comments/' . $comment->id) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->id }}').submit();" class="btn-sm btn-link text-danger text-uppercase">Delete</a>
                <form id="comment-delete-form-{{ $comment->id }}" action="{{ url('comments/' . $comment->id) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endcan
        </div>

        @can('edit-comment', $comment)
            <div class="modal fade" id="comment-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Comment</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Update your message here:</label>
                                    <textarea required class="form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        @can('reply-to-comment', $comment)
            <div class="modal fade" id="reply-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Reply to Comment</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Enter your message here:</label>
                                    <input required class="form-control" name="message" rows="3"></input>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Reply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        <br />{{-- Margin bottom --}}

        {{-- Recursion for children --}}
        @if($grouped_comments->has($comment->id))
            @foreach($grouped_comments[$comment->id] as $child)
                @include('comments::_comment', [
                    'comment' => $child,
                    'reply' => true,
                    'grouped_comments' => $grouped_comments
                ])
            @endforeach
        @endif

    </div>
@if(isset($reply) && $reply === true)
  </div>
@else
  </li>
@endif