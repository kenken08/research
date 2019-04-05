{!! Form::open(['id'=>'email{{$proposal->user_id}}','action'=>['UploadController@sendRevision', $proposal->user_id], 'method'=>'POST']) !!}
{{ Form::token() }}
<div class="modal fade" id="modalComment{{$proposal->user_id}}" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:1050px;margin-left:-210px;">
            <div class="modal-header bg-primary text-left">
                <h4 class="modal-title" id="modalLabeldanger"><i class="fa fa-comment"></i> Feedback</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <label for="">Comment:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <textarea id="ckeditor{{$proposal->user_id}}" class="form-control" required name="feedback" rows="10" placeholder="Enter your Comment Here"></textarea>
                    </div>
                    <div class="col-md-6">
                        <iframe src="/storage/proposal/{{$proposal->proposal}}#zoom=60" frameborder="0" width="500px" height="550px"></iframe>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-xs btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditor{{$proposal->user_id}}',
    {
        toolbar :
        [
            [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ],
            ['Bold','Italic','Underline','Strike','-','NumberedList','BulletedList'],
            [ 'Styles','Format' ],
        ],
        height: "270px"
    });
</script>