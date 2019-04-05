{!! Form::open(['action'=>['UserController@destroy',$user->id],'method'=>'POST']) !!}
{!! csrf_field() !!}
<div class="modal fade" id="modalDelete{{$user->id}}" role="dialog" aria-labelledby="modalLabeldanger">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title" id="modalLabeldanger">DELETE</h4>
            </div>
            <div class="modal-body">
                <h5>Are you sure you want to <strong>DELETE</strong></h5><br>
                <h4>{{$user->fname.' '.$user->minitial.' '.$user->sname}}?</h4>
            </div>
            <div class="modal-footer">
                <button class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
                <button name="delete" type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}