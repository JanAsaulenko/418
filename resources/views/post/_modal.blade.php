<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="container" id="usrInfo">
                    <p class="card-text">Коментар {{$post->comments}}</p>
                    <p class="card-text">
                        <small class="text-muted">Користувач
                            {{$post->username}} Дата
                            ({{ Carbon\Carbon::parse($post->created_at)->format('d-m-y') }})
                        </small>
                    <div class="cords" style="visibility: hidden">
                        data-lat="{{$post->lat}}"
                        data-lng="{{$post->lng}}"
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>