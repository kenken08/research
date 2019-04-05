@extends('layouts.app')
@section('css')
@include('landingpage.maincss')
@endsection
@section('contents')
<div class="container">
    <div class="row">
        <form name="searchf" class="col-md-8" id="search-result" style="margin-top:5%" action="{{URL::to('/search-result')}}" method="POST" role="search">
            {!! csrf_field() !!}
            {{-- <div class="form-group col-md-8 col-md-offset-2"> --}}
                {{-- <div class="input-group-lg center-block">
                        <input id="search" name="search" type="text" class="shadow form-control" placeholder="What're you looking for?" ondblclick="document.getElementById('search').click()" value="{{ old('search') }}">
                    </div> --}}
            {{-- </div> --}}
            <div class="input-group input-group-lg">
                <span class="input-group-addon" style="cursor:pointer;color:white;border-color:transparent;">
                    <select name="filter" id="filter" style="box-shadow:none;border-color:transparent;background:transparent;">
                        <option style="color:black" value="all">All</option>
                        <option style="color:black" value="title">Title</option>
                        <option style="color:black" value="program">Program</option>
                        <option style="color:black" value="college">College</option>
                    </select>
                </span>
                <input style="height:50px" id="search" name="search" type="text" class="form-control" placeholder="What're you looking for?" ondblclick="document.getElementById('search').click()" value="{{ old('search') }}" aria-describedby="sizing-addon1" >
                <a class="input-group-addon" onclick="document.getElementById('search-result').submit();" style="box-shadow:none;border-color:transparent;cursor:pointer; color:white">Search</a>
            </div>
        </form> 
    </div>
    <div class="row">
        <div class="container">
            @if(count($details)>=1)
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="pull-left" style="color:black;">Search result(s) for: <strong>{{isset($search)? $search : $searche}}</strong></h3>
                        </div>
                        <div class="col-md-12">
                            <span class="pull-left">
                                <h5>Filter By: {{ucwords($filter)}}</h5>
                                <strong class="pull-left">About {{count($details)}} result(s)</strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="container">
                    @foreach($details as $result)
                        <div class="row">
                            <div class="col-md-8 text-left">
                                @if($filter == 'title')
                                    <h4><a style="color:blue;" target="_blank" href="/search-result/{{$result->researchid}}/viewer">{!! str_replace($search,"<strong style='background-color:yellow'>".$search."</strong>",\Illuminate\Support\Str::words($result->title,50)) !!} </a></h4>
                                    <small>Author: {!! \App\USer::where('id',$result->user_id)->value('fname').' '.\App\USer::where('id',$result->user_id)->value('minitial').' '.\App\USer::where('id',$result->user_id)->value('sname') !!}</small>
                                @else
                                    <h4><a style="color:blue;" target="_blank" href="/search-result/{{$result->researchid}}/viewer">{!! $result->title !!} </a></h4>
                                    <small>Author: {!! \App\USer::where('id',$result->user_id)->value('fname').' '.\App\USer::where('id',$result->user_id)->value('minitial').' '.\App\USer::where('id',$result->user_id)->value('sname') !!}</small>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="text-left">
                                    <small>
                                        <?php
                                            if(isset($search)){
                                                echo str_replace($search,"<strong style='background-color:yellow'>".$search."</strong>",\Illuminate\Support\Str::words(substr($result->researchBody,40),30));
                                            }else{
                                                echo str_replace($searche,"<strong style='background-color:yellow'>".$searche."</strong>",\Illuminate\Support\Str::words(substr($result->researchBody,40),30));
                                            }
                                        ?>
                                    </small>
                                    <form action="{{URL::to('/search-result')}}" method="POST">@csrf
                                        <?php
                                            $exp = $result->tagname; 
                                            $id = $result->id;
                                            $sepa = explode(',',$exp);
                                            $ite = count($sepa);
                                            
                                            for($i=0;$i<$ite;$i++){
                                                echo "<a id=tag".$id.$i.$result->researchid." class='btn btn-xs btn-info' onclick='tsearch(this.id)'>" .$sepa[$i]. " " . "</a>&nbsp;";
                                            }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Showing {{$details->total()}} of {{count($details)}}</h4>
                        </div>
                        <div class="col-md-6">
                            @foreach($details as $result)
                                <h4 class="pull-right">{!!$details->links()!!}</h4>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <h3 class="text-center" style="padding-top:70px">Your search for {{$search}} did not match any document.</h3>
            @endif
        </div>
    </div>
</div>
@endsection
@section('scripts')
@include('landingpage.mainscript')
<script>
    function tsearch(id){
        var el = document.getElementById(id)
        var text = el.innerHTML

        var search = document.getElementById('search')
        search.value = text
        document.searchf.submit()
    }
</script>
@endsection