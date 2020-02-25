<div id="Rate-{{auth::user()->id}}" class="modal fade" role="dialog" style="width: 300px; margin:auto">
    <div class="modal-dialog">
        <p style="display:none"></p>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="card" style="border: none; width:90%; margin:auto; text-align:center">
                    <img src="{{asset(auth()->user()->cover)}}" alt="John" style="vertical-align: middle;width: 100px; height: 100px;border-radius: 50%;margin:auto">
                    <h3 class="title">{{ auth()->user()->name }}</h3>
                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ auth()->user()->averageRating }}" data-size="xs" disabled="">
                </div>
            </div>
        </div>
    </div>
</div>