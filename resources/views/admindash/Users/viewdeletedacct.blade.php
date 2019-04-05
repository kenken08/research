@extends('layouts.admin')

@section('contents')
<aside class="right-side">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-danger table-edit">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span>
                            <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> {{$title}}
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
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr role="row" class="odd" data-id="1">
                                    <td class="text-center"  style="vertical-align:middle;">{{$user->id}}</td>
                                    <td  style="vertical-align:middle;">{{$user->fname.' '.ucwords($user->minitial).' '.$user->sname}}</td>
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
                                    <td class="text-center"  style="vertical-align:middle;">
                                        <button name="delete" type="submit" class="btn btn-xs btn-warning md-trigger" data-toggle="modal" data-target="#modalRecover{{$user->id}}">Recover</button>
                                        @include('admindash.Users.userrecovermodal')
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