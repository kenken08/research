@extends('layouts.admin')

@section('contents')
<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">
                <a href="/dashboard">
                    <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Dashboard
                </a> >>
                <a href="/dashboard">
                    <i class="livicon" data-name="responsive" data-size="14" data-color="#333" data-hovercolor="#333"></i> {{$title}}
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
                        <i class="livicon" data-name="responsive" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>Announcements
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
                @endif
                <div class="portlet-body flip-scroll">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="well-body">
                                <a href="" data-toggle="modal" data-target="#modalAnnouncement" class="btn btn-primary"><i class="livicon" data-name="plus" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>Create New Announcement</a>
                            </div>
                        </div>
                    </div>
                    @include('admindash.announcements.addannouncemodal')
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Announcement Title</th>
                                <th>Description</th>
                                <th>Cover Photo</th>
                                <th>Date Posted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($announcements as $announce)
                                <tr>
                                    <td style="vertical-align:middle;">{!! $announce->title !!}</td>
                                    <td style="vertical-align:middle;">{!! $announce->description !!}</td>
                                    <td class="text-center" style="vertical-align:middle;"><img height="50px" width="100px" src="/storage/cover_photo/{!! $announce->cover_photo !!}" alt=""></td>
                                    <td class="text-center" style="vertical-align:middle;">{!! $announce->created_at->format('F d, Y') !!}</td>
                                    <td class="text-center" style="vertical-align:middle;"><a href="" class="btn btn-xs btn-danger">Deactivate</a></td>
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