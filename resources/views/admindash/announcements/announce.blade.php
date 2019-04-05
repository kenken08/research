@extends('layouts.admin')
@section('contents')

<aside class="right-side">
    <div class="row" style="margin-top: 10px">
        <div class="col-md-6">
            @if($flash = session('error'))
                <script>
                    swal({
                    title: "You can only upload once, please contact your administrator!",
                    text: "",
                    icon: "error",
                    button: "OK",
                    });
                </script>
            @elseif($flash = session('success'))
                <script>
                    swal({
                    title: "Posted Successfully",
                    text: "",
                    icon: "success",
                    button: "OK",
                    });
                </script>
            @endif
            
            {!!Form::open(['action'=>'MessagesController@addAnnounce','method'=>'POST', 'enctype'=>'multipart/form-data'])!!}            
            {{Form::token()}}
                <div class="panel">
                    <div class="panel-header" style="background:teal; color:white;">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Add {{$title}}</h4>
                            </div>
                        </div>
                    </div>
                   <div class="panel-body"><br>
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
                                    <textarea name="adescription" id="adescription" cols="60" rows="10"></textarea>
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
                   <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-6 pull-right">
                                <button type="submit" class="btn btn-success col-md-12" name="upload">Submit</button>
                            </div>
                        </div>
                   </div>
                </div>
            {!!Form::close()!!}
        </div>
        <div class="col-md-6">
            <iframe id="viewer" frameborder="0" style="width:100%;height:520px;"></iframe>
        </div>
    </div>
</aside>
@endsection
<script>
    function PreviewPDF(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#viewer')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

