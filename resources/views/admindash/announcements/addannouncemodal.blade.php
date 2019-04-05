{!!Form::open(['action'=>'MessagesController@addAnnounce','method'=>'POST', 'enctype'=>'multipart/form-data'])!!}            
{{Form::token()}}
<div class="modal fade" id="modalAnnouncement" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-left">
                <h4 class="modal-title" id="modalLabeldanger"><i class="fa fa-plus"></i>New Announcement</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="position: static">
                            <label>Announcement Title</label>
                            <input type="text" id="atitle" class="form-control" name="atitle" value="{{ old('atitle') }}" required autofocus>
                                @if ($errors->has('atitle'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ptitle') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group" style="position: static;">
                            <label>Announcement Description</label><br>
                            <textarea class="form-control" name="adescription" id="adescription" cols="60" rows="10"></textarea>
                                @if ($errors->has('adescription'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('adviser') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview fileinput-exists thumbnail">
                                <div class="form-group">
                                    <div class="fileinput-new thumbnail">
                                        <img src="/storage/cover_photo/" class="img-responsive user_image" alt="image" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">Upload Cover Photo</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" id="uploadcover" name="uploadcover">
                                </span>
                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
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
{!!Form::close()!!}