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
                    <i class="livicon" data-name="users" data-size="14" data-color="#333" data-hovercolor="#333"></i> Users
                </a> >>
                <a href="/dashboard">
                    <i class="livicon" data-name="list" data-size="14" data-color="#333" data-hovercolor="#333"></i> Users List
                </a>
            </li>
        </ol>
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary table-edit">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span>
                            <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>Users List
                        </span>
                    </h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                        <thead class="table_head">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1">ID</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1">Name</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1">Email</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1">Role</th>
                                @if(Auth::user()->role == 0)
                                    <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr role="row" class="odd" data-id="1">
                                    <td class="text-center"  style="vertical-align:middle;">{{$user->studentid}}</td>
                                    <td  style="vertical-align:middle;">
                                        <a data-toggle="modal" data-target="#modalView{{$user->studentid}}">{{$user->fname.' '.ucwords($user->minitial).' '.$user->sname}}</a>
                                        @include('admindash.Users.userviewmodal')
                                    </td>
                                    <td  style="vertical-align:middle;">{{$user->email}}</td>
                                    <td class="text-center"  style="vertical-align:middle;">
                                        @if($user->role == 0)
                                            <span class="label label-primary">Super Admin</span>
                                        @elseif($user->role == 1)
                                            <span class="label label-success">Student</span>
                                        @elseif($user->role == 2)
                                            <span class="label label-info">Admin</span>
                                        @elseif($user->role == 3)
                                            <span class="label label-danger">Staff</span>
                                        @endif
                                    </td>
                                    @if(Auth::user()->role == 0)
                                        @if($user->role != 1 AND $user->role != 0)
                                            <td class="text-center"  style="vertical-align:middle;">
                                                <button name="delete" type="submit" class="btn btn-xs btn-danger md-trigger" data-toggle="modal" data-target="#modalDelete{{$user->id}}"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                                @include('admindash.Users.deleteusermodal')
                                            </td>
                                        @else
                                            <td class="text-center"><span class="label label-info">No Action</span></td>
                                        @endif
                                    @endif
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