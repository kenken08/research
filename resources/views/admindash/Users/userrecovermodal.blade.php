{!! Form::open(['action'=>['UserController@recover',$user->id],'method'=>'POST']) !!}
{!! csrf_field() !!}
<div class="modal fade" id="modalRecover{{$user->id}}" role="dialog" aria-labelledby="modalLabelprimary">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="modalLabeldanger">Recover</h4>
            </div>
            <div class="modal-body">
                <h5>Are you sure you want to <strong>RECOVER</strong></h5><br>
                <h4>{{$user->fname.' '.$user->minitial.' '.$user->sname}}?</h4>
            </div>
            <div class="modal-footer">
                <button id="submit" type="submit" class="btn hidden btn-xs btn-success"></button>
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-xs btn-success" onclick="document.getElementById('submit').click()">Yes</a>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <a class="btn btn-xs btn-danger" data-dismiss="modal">No</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}