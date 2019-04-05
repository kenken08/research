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
                    <i class="livicon" data-name="list" data-size="14" data-color="#333" data-hovercolor="#333"></i> Manuscripts
                </a> >>
                <a href="/dashboard">
                    <i class="livicon" data-name="tags-edit" data-size="14" data-color="#333" data-hovercolor="#333"></i> Edit Tags
                </a>
            </li>
        </ol>
    </section>
    <div class="row">
        <div class="col-md-6">
            <iframe src="{{URL::to('/')}}/{{$filePath}}" frameborder="0" style="width:100%;height:590px;"></iframe>
        </div>
        <div class="col-md-6">
            {!! Form::open(['id'=>'edittags','action'=>'UploadController@updatetags','method'=>'POST']) !!}
            {!! csrf_field() !!}
                <div class="panel panel-primary">
                    <div class="panel-heading panel-primary">
                        <h3 class="panel-title">{{$document->title}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <strong><i class="livicon" data-name="tags" data-loop="true" data-size="20"></i> Old Tags</strong>
                            <div class="text-center">
                                @if(count($tags)>=1)
                                    @foreach($tags as $tag)
                                        <?php 
                                            $sepa = explode(',',$tag->tagname);
                                            $ite = count($sepa);
                                            
                                            for($i=0;$i<$ite;$i++){
                                                echo "  
                                                        <span class='label label-info'>".$sepa[$i]." "."</span>&nbsp;
                                                    ";
                                            }
                                        ?>
                                    @endforeach
                                @else
                                    <span class="label label-danger">No Tag(s)</span>
                                @endif
                            </div>
                            <hr>
                            <strong><i class="livicon" data-name="edit" data-loop="true" data-size="20"></i> Enter New Tags</strong><br>
                            <div class="form-group" style="position: static;">
                                <input data-role="tagsinput" name="tags" id="tags" type="text" value="
                                    @foreach($tags as $tag)
                                        {{",".$tag->tagname}}
                                    @endforeach
                                "><br>
                                <small calss="text-red text-italic">Note: Separate Tags with comma (e.g tags2, tag2)</small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <input id="tag_id" type="text" name="tag_id" class="hidden" value="{{$tag_id}}">
                        <input id="research_id" type="text" name="research_id" class="hidden" value="{{$research_id}}">
                        <a href="/upload-proposal/manuscript" class="btn btn-warning"><i class="livicon" data-name="chevron-left" data-loop="true" data-size="15" data-c="#fff"></i> Back</a>
                        <button type="submit" class="btn btn-success"><i class="livicon" data-name="save" data-loop="true" data-size="15" data-c="#fff"></i> Submit</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</aside>
@endsection