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
                    <i class="livicon" data-name="random" data-size="14" data-color="#333" data-hovercolor="#333"></i> Undergraduate Thesis
                </a> >>
                <a href="/dashboard">
                    <i class="livicon" data-name="list" data-size="14" data-color="#333" data-hovercolor="#333"></i> Manuscripts
                </a>
            </li>
        </ol>
    </section>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="livicon" data-name="responsive" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Undergraduate Manuscript
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Student ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Date Uploaded</th>
                                <th>Tags</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proposals as $proposal)
                               
                                <tr>
                                    @foreach($users as $user)
                                        @if($proposal->user_id == $user->id)
                                            <td class="text-center" style="vertical-align:middle;">
                                                {{$user->studentid}}
                                                <input type="text" name="resID" value="{{ $proposal->id }}" class="hidden">
                                            </td>
                                            <td style="vertical-align:middle;">
                                                {{isset($user->fname)? $user->fname.' '.$user->minitial.' '.$user->sname:'-'}}
                                            </td>
                                        @endif
                                    @endforeach
                                    <td style="vertical-align:middle;">
                                        <a target="_blank" href="/manuscript/{{$proposal->title}}">
                                            {{$proposal->title}}
                                        </a>
                                    </td>
                                    <td class="text-center" style="vertical-align:middle;">{{date('F d, Y', strtotime($proposal->datemanuscript))}}</td>
                                    <td class="text-center" style="vertical-align:middle;max-width:360px;">
                                        @foreach($tags as $tag)
                                            @if($proposal->id == $tag->researchid)
                                                <?php 
                                                    $sepa = explode(',',$tag->tagname);
                                                    $ite = count($sepa);
                                                    
                                                    for($i=0;$i<$ite;$i++){
                                                        echo "<span class='label label-info'>".$sepa[$i]."</span>&nbsp;";
                                                    }
                                                ?>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center" style="vertical-align:middle;">
                                        <a href="/upload-proposal/manuscript/{{$proposal->id}}/tags" class="btn btn-danger btn-md" style="min-width:120px;">Edit Tags</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</aside>
@endsection