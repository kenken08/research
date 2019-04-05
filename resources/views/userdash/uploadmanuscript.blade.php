@extends('layouts.dashuser')
@section('contents')

<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">
                <a href="/user-dashboard">
                    <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Dashboard
                </a> >>
                <a href="">
                    <i class="livicon" data-name="plus" data-size="14" data-color="#333" data-hovercolor="#333"></i> Upload Manuscript
                </a>
            </li>
        </ol>
    </section>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @if($flash = session('error'))
                <script>
                    swal({
                    title: "You can only upload once, please contact your administrator!",
                    text: "",
                    icon: "error",
                    button: "OK",
                    });
                </script>
            @elseif($flash = session('errorsss'))
                <script>
                    swal({
                    title: "Accepts PDF only!",
                    text: "",
                    icon: "error",
                    button: "OK",
                    });
                </script>
            @elseif($flash = session('wrong'))
                <script>
                    swal({
                    title: "Wrong Research Number!",
                    text: "",
                    icon: "error",
                    button: "OK",
                    });
                </script>
            @elseif($flash = session('require'))
                <script>
                    swal({
                    title: "Title, Tags, File (Abstract, Manuscript).pdf are required fields",
                    text: "",
                    icon: "error",
                    button: "OK",
                    });
                </script>
            @elseif($flash = session('success'))
            <script>
                    swal({
                    title: "Uploaded Successfully",
                    text: "",
                    icon: "success",
                    button: "OK",
                    });
                </script>
            @endif
            
            {{--{!!Form::open(['action'=>'UploadController@store','method'=>'POST', 'enctype'=>'multipart/form-data'])!!}--}}
            {!!Form::open(['action'=>'UploadController@update','method'=>'POST', 'enctype'=>'multipart/form-data'])!!}            
            {{Form::token()}}
                <div class="panel">
                    <div class="panel-header" style="background:teal; color:white;">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><i class="livicon" data-name="upload" data-size="16" data-color="#fff" data-hovercolor="#fff"></i> Upload {{$title}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body"><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-body" style="border:black;border-left: 5px solid #43ac6a!important;">&emsp;
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                Fields that are marked with <span class="text-danger">*</span> are required.
                                            </p>
                                            <p>Note: You can preview your File before uploading.</p>
                                        </div>
                                    </div>
                                </div><br>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                                    @if($errors->has('title'))
                                        <span class="invalid-feedback">
                                            <strong class="text-red">{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Enter Tags: <span class="text-danger">*</span></label><br>
                                    <input name="tags" id="tags" type="text" class="form-control" value="" data-role="tagsinput" required><br>
                                    @if($errors->has('tags'))
                                        <span class="invalid-feedback">
                                            <strong class="text-red">{{ $errors->first('tags') }}</strong>
                                        </span>
                                    @endif
                                    <small class="text-red">Please separate the tags by pressing (,) key</small>
                                    {{-- <input class="form-control"> --}}
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview fileinput-exists thumbnail">
                                                <div class="form-group">
                                                    <div class="fileinput-new thumbnail">
                                                        <iframe frameborder="0" height="20px" width="100px"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Upload Abstract</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" accept="application/pdf" name="uploadabs" onchange="PreviewPDFabs(this)" required>
                                                </span>
                                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                <a href="" class="btn fileinput-exists btn-success" data-toggle="modal" data-target="#abs">Preview Abstract</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview fileinput-exists thumbnail">
                                                <div class="form-group">
                                                    <div class="fileinput-new thumbnail">
                                                        <iframe frameborder="0" height="20px" width="100px"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Upload Manuscript</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" accept="application/pdf" id="uploadmanu" name="uploadmanu" onchange="PreviewPDF(this)" required>
                                                </span>
                                                <a class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                <a class="btn fileinput-exists btn-success" data-toggle="modal" data-target="#manumodal">Preview Manuscript</a>
                                            </div>
                                        </div>
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
        <div class="col-md-2"></div>
        @include('userdash.absmodal')
        @include('userdash.manumodal')
    </div>
</aside>
@endsection
<script>
    function PreviewPDF(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#viewermanu')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function PreviewPDFabs(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#viewerabs')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

