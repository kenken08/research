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
                    <i class="livicon" data-name="plus" data-size="14" data-color="#333" data-hovercolor="#333"></i> Upload Proposal
                </a>
            </li>
        </ol>
    </section>
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
    @elseif($flash = session('require'))
        <script>
            swal({
            title: "Proposal Title, Adviser, and File Upload are required",
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
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            {!!Form::open(['action'=>'UploadController@upload','method'=>'POST', 'enctype'=>'multipart/form-data','id'=>'commentForm'])!!}            
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
                                            <p>Fields that are marked with <span class="text-danger">*</span> are required.</p>
                                            <p>Check your Title before saving.</p>
                                            <p>Note: You can preview your File before uploading.</p>
                                        </div>
                                    </div>
                                </div><br>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" style="position: static">
                                    <label>Proposal Title <span class="text-danger">*</span></label>
                                    <input type="text" id="ptitle" class="form-control" name="ptitle" onchange="change()" value="{{ ($pstat == null)? old('ptitle') : $pstat->title}}" required autofocus>
                                    @if ($errors->has('ptitle'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('ptitle') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group" style="position: static;">
                                    <label>Adviser <span class="text-danger">*</span></label>
                                    <input type="text" id="adviser" class="form-control" name="adviser" value="{{ ($pstat == null)? old('adviser') : $pstat->adviser}}" required autofocus>
                                    @if ($errors->has('adviser'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('adviser') }}</strong>
                                        </span>
                                    @endif
                                </div>
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
                                            <span class="fileinput-new">Upload Proposal <span class="text-danger">*</span></span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" id="uploadprop" accept="application/pdf" name="uploadprop" onchange="PreviewPDF(this)">
                                        </span>
                                        <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        <a class="fileinput-exists btn btn-success" data-toggle="modal" data-target="#proposal">Preview</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-12">
                                @if(\App\research_papers::where('user_id',Auth::user()->id)->value('proposal_status') == 'approved')
                                    <button disabled type="submit" class="btn btn-success col-md-4 pull-right" name="upload">Submit</button>
                                @else
                                    <button type="submit" class="btn btn-success col-md-4 pull-right" name="upload">Submit</button>
                                @endif
                            </div>
                        </div>
                   </div>
                </div>
            {!!Form::close()!!}
        </div>
        <div class="col-md-2"></div>
        @include('userdash.proposalmodal')
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

