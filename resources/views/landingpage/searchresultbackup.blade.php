@extends('layouts.app')
@section('css')
@include('landingpage.maincss')
@endsection
@section('contents')
<div class="container">
    <div class="row">
        <form name="searchf" class="col-md-12" id="center" style="margin-top:5%" action="{{URL::to('/search-result')}}" method="POST" role="search">
            {!! csrf_field() !!}
            {{-- <div class="form-group col-md-8 col-md-offset-2"> --}}
                {{-- <div class="input-group-lg center-block">
                        <input id="search" name="search" type="text" class="shadow form-control" placeholder="What're you looking for?" ondblclick="document.getElementById('search').click()" value="{{ old('search') }}">
                    </div> --}}
            {{-- </div> --}}
            <div class="input-group input-group-lg">
                <input id="search" name="search" type="text" class="form-control" placeholder="What're you looking for?" ondblclick="document.getElementById('search').click()" value="{{ old('search') }}" aria-describedby="sizing-addon1" >
                <a class="input-group-addon" onclick="document.getElementById('search-result').submit();" style="cursor:pointer; color:white">Search</a>
            </div>  
        </form> 
            <div class="container" style="width:100%;" align="center">
                @if(count($details)>=1)
                    <h3 class="pull-left"><strong>Search result for: {{$search}}</strong></h3>
                    <ul class="nav navbar-nav col-md-12" style="margin-bottom: 100px" >
                        @foreach($details as $result)
                            <li class="col-md-3">
                                <div style="margin-top:20px;margin-bottom:10px">
                                    <div>
                                        <a target="_blank" href="/search-result/{{$result->researchid}}/viewer">
                                            <img src="/images/defaultcover.png" alt="">
                                        </a>
                                    </div>
                                    <h4 class="text-center" style="width: 230px">{{$result->title}}</h4>
                                </div>
                            <p class="text-center" data-role="tagsinput">
                            <form action="{{URL::to('/search-result')}}" method="POST">@csrf
                                <?php 
                                    $exp = $result->tagname; 
                                    $id = $result->id;
                                    $sepa = explode(',',$exp);
                                    $ite = count($sepa);
                                    
                                    for($i=0;$i<$ite;$i++){
                                        // echo "<input class='hidden' name='tags' value=".$sepa[$i].">"; 
                                        echo "<a id=tag".$i.$id." class='btn btn-sm btn-info' onclick='tsearch(this.id)'>" .$sepa[$i]. " " . "</a>&nbsp;";
                                    }
                                ?>
                            </form>
                            </p>
                            </li>
                        @endforeach
                    </ul> 
                @else
                    <h3 class="text-center" style="padding-top:70px">Your search did not match any document.</h3>
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

{{-- <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
    <div class='carousel-outer'>
        <!-- Wrapper for slides -->
        <div class='carousel-inner'>
            @php($i=0)
            @foreach(\App\announcements::orderBy('created_at','DESC')->get() as $ann)
                <div class='item text-center {{($i==1)? 'active':''}} '>
                    <img class="text-center" src="/storage/cover_photo/{{$ann->cover_photo}}" width="250px" style="max-height:200px;" alt="">                                                        
                    <small class="btn btn-sm btn-primary"> {{date('F d, Y', strtotime($ann->created_at))}}</small>
                    <h2 class="text-left">{{$ann->title}}</h2>
                    <h4 class="text-center">{{$ann->description}}</h4>
                </div>
            @php($i++)
            @endforeach
        </div>
        <!-- Controls -->
        <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
            <span class='glyphicon glyphicon-chevron-left'></span>
        </a>
        <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
            <span class='glyphicon glyphicon-chevron-right'></span>
        </a>
    </div>
</div> --}}