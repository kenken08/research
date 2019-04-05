@extends('layouts.admin')

@section('contents')
<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">
                <a href="/dashboard">
                    <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Dashboard
                </a> >>
                <a href="">
                    <i class="livicon" data-name="random" data-size="14" data-color="#333" data-hovercolor="#333"></i> Archive
                </a> >>
                <a href="/dashboard">
                    <i class="livicon" data-name="plus" data-size="14" data-color="#333" data-hovercolor="#333"></i> Add Manuscript
                </a>
            </li>
        </ol>
    </section>
    <div class="row">  
        <div class="col-md-6">
            <div class="panel panel-success" id="hidepanel6">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="notebook" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Add Manuscript
                    </h3>
                </div>
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
                <form id="commentForm" role="form" action="{{route('storearchive')}}" method="POST" enctype="multipart/form-data"> @csrf
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group">
                                <label>Research Number</label>
                                <input type="number" class="form-control" name="research_number" id="research_number" placeholder="Researh Number">
                                @if($errors->has('research_number'))
                                    <span class="invalid-feedback">
                                        <strong class="text-red">{{ $errors->first('research_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                                @if($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong class="text-red">{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input type="text" class="form-control" name="author" id="author" placeholder="Author">
                                @if($errors->has('author'))
                                    <span class="invalid-feedback">
                                        <strong class="text-red">{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Enter Tags:</label><br>
                                <input name="tags" id="tags" type="text" class="form-control" value="" data-role="tagsinput"/><br>
                                @if($errors->has('tags'))
                                    <span class="invalid-feedback">
                                        <strong class="text-red">{{ $errors->first('tags') }}</strong>
                                    </span>
                                @endif
                                <small class="text-red">Please separate the tags by pressing ENTER key</small>
                                {{-- <input class="form-control"> --}}
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <iframe frameborder="0" style="max-width:200px;" height="50px"></iframe>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Upload Abstract</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="uploadabs" accept="application/pdf">
                                            </span>
                                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <iframe frameborder="0" style="max-width:200px;" height="50px"></iframe>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Upload Manuscript</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" id="uploadmanu" name="uploadmanu" onchange="PreviewPDF(this)">
                                            </span>
                                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            {{-- <input type="button" class="btn fileinput-exists btn-primary" value="Preview" onclick="PreviewImage();" /> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <button type="submit" class="btn btn-success pull-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <iframe id="viewer" frameborder="0" style="width:100%;height:590px;"></iframe>
        </div>
    </div>
</aside>
@endsection
{{-- <script type="text/javascript">
    function PreviewImage() {
        pdffile=document.getElementById("uploadmanu").files[0];
        pdffile_url=URL.createObjectURL(pdffile);
        $('#viewer').attr('src',pdffile_url);
    }
</script> --}}
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