@extends('layouts.admin')

@section('contents')
<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">
                <a href="/dashboard">
                    <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Dashboard
                </a> >>
                <a href="/banners">
                    <i class="livicon" data-name="film" data-size="14" data-color="#333" data-hovercolor="#333"></i> {{$title}}
                </a>
            </li>
        </ol>
    </section>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box success">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="livicon" data-name="film" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> {{$title}}
                    </div>
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
                @elseif($flash = session('success'))
                    <script>
                        swal({
                        title: "Posted Successfully",
                        text: "",
                        icon: "success",
                        button: "OK",
                        });
                    </script>
                @elseif($flash = session('successss'))
                    <script>
                        swal({
                        title: "Updated Successfully",
                        text: "",
                        icon: "success",
                        button: "OK",
                        });
                    </script>
                @endif
                <div class="portlet-body flip-scroll">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="well-body">
                                <a href="" data-toggle="modal" data-target="#modalBanner" class="btn btn-primary"><i class="livicon" data-name="plus" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>Add New Banner</a>
                            </div>
                        </div>
                    </div>
                    @include('admindash.banners.banner-modal')
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Banner Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Date Posted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banners as $ban)
                                <tr>
                                    <td style="vertical-align:middle">{{$ban->title}}</td>
                                    <td style="vertical-align:middle">{{$ban->description}}</td>
                                    <td style="vertical-align:middle" class="text-center"><img src="/storage/banner_photo/{{$ban->image}}" alt="" width="200px" height="100px"></td>
                                    <td style="vertical-align:middle" class="text-center">{{date('F d, Y', strtotime($ban->created_at))}}</td>
                                    <td style="vertical-align:middle" class="text-center">
                                        @if($ban->status == 'deactivated')
                                            <form id="actform{{$ban->id}}" action="{{route('update-stat',$ban->id)}}" method="post"> @csrf
                                                <a class="btn btn-success" onclick="document.getElementById('actform{{$ban->id}}').submit()">Activate</a>
                                            </form>
                                        @else
                                            <form id="deactform{{$ban->id}}" action="{{route('update-stat',$ban->id)}}" method="post"> @csrf
                                                <a href="#" class="btn btn-danger" onclick="document.getElementById('deactform{{$ban->id}}').submit()">Deactivate</a>
                                            </form>
                                        @endif
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