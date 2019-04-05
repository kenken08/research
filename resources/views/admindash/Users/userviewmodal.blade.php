<div class="modal fade" id="modalView{{$user->studentid}}" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="modalLabeldanger">Account Profile</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img class="img img-circle" src="/storage/profilepic/{{$user->profilepic}}" style="width:150px;height:150px">
                    </div>
                    <div class="col-md-8">
                        <h5>
                            <strong>Name&emsp;&emsp;:</strong> {{$user->fname.' '.$user->minitial.' '.$user->sname}} <hr>
                            <strong>Email &emsp;&emsp;:</strong> {{$user->email}} <hr>
                            @if($user->role != 1)
                                <strong>Position&emsp;:</strong> {{ $user->position }}
                            @endif
                        </h5>
                    </div>
                </div>
                @if($user->role == 1)
                    <div class="row">
                        <div class="col-md-5">
                            @if(\App\research_papers::where('user_id',$user->id)->value('id')==null)
                                <h5>Proposal: <span class="btn btn-sm btn-danger">No Uploaded Proposal</span></h5>
                            @else
                                <h5>Proposal: <span class="btn btn-sm btn-{{(\App\research_papers::where('user_id',$user->id)->value('proposal_status') == 'approved')? 'success':'warning'}}">{{ucwords(\App\research_papers::where('user_id',$user->id)->value('proposal_status'))}}</span></h5>
                            @endif
                        </div>
                        <div class="col-md-{!! (\App\research_papers::where('user_id',$user->id)->value('id') !== null )?  '7':'6' !!}">
                            <h5>Manuscript: <span>{!! (\App\research_papers::where('user_id',$user->id)->value('manuscript') !== null )?  '<span class="btn btn-sm btn-success">Completed</span>': '<span class="btn btn-sm btn-danger">No Submitted Manuscript</span>'!!}</span></h5>
                        </div>
                    </div>
                @endif
                <hr>
                <div class="row">
                    @foreach($colleges as $col)
                        @if($col->id == $user->collegeid)
                            <h5>
                                <strong>College&emsp;&emsp;:</strong> {{$col->cname}}<hr>
                                <strong>Program &emsp;:</strong> {{$col->pname}}
                            </h5>
                        @elseif($user->collegeid == null)
                            <h5>
                                <strong>College&emsp;&emsp;:</strong> N/A<hr>
                                <strong>Program &emsp;:</strong> N/A
                            </h5>@break
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>