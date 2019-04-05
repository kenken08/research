<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\research_papers;
use App\research_details;
use App\colleges;
use App\programs;
use App\logs;
use App\tags;
use App\taggables;
use App\sendrevisioncomment;
use App\approvecomment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;
use App\Mail\SendNumber;
use App\Mail\SendRevision;
use Illuminate\Support\Facades\Input;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use Symfony\Component\HttpFoundation\Response; 
use Illuminate\Notifications\Notification;

class UploadController extends Controller
{
     public function index()
    {
        $title ='Proposal';
        $prop = research_papers::where('user_id',Auth::user()->id)->value('id');
        $pstat = research_papers::find($prop);
        return view ('userdash.uploadproposal', compact('pstat','title'));
    }
    public function upload(Request $request)
    {
        if($request->input('ptitle')==null || $request->input('adviser')==null || $request->hasFile('uploadprop')==false){
            session()->flash('require');
            return redirect()->back();
        }else{
            $postid = research_papers::where('user_id',Auth::user()->id)->value('id');
            $post = research_papers::where('user_id',Auth::user()->id)->value('proposal');
            
            if($post !== null){
                $postup = research_papers::find($postid);
                Storage::delete('/public/proposal/'.$postup->proposal);
                
                if($request->hasFile('uploadprop')){
                    $filenameWithExt = $request->file('uploadprop')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('uploadprop')->getClientOriginalExtension();
                    $fileNameToStore = $postid.'.'.$extension;
                    $path = $request->file('uploadprop')->storeAs('public/proposal', $fileNameToStore);
                } else {
                    $fileNameToStore ='';
                }

                if($extension == 'docx' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'pptx' || $extension == 'xls'){
                    session()->flash('errorsss');
                    return redirect()->back();
                }else{

                    // $com = sendrevisioncomment::where('reciever_id',Auth::user()->id)->value('id');
                    // if(!$com == null){
                    //     $comd = sendrevisioncomment::find($com);
                    //     $comd->delete();
                    // }

                    $upload = research_papers::find($postid);
                    $upload->proposal = $fileNameToStore;
                    $upload->user_id = auth()->user()->id;
                    $upload->title = $request->input('ptitle');
                    $upload->adviser = $request->input('adviser');
                    $upload->proposal_status = "pending";
                    $upload->dateproposal = Carbon::today();
                    $upload->save();

                    $pdfFilePath = 'storage/proposal/'.$fileNameToStore;

                    session()->flash('success','Uploaded successfully!');
                    return redirect('/user-dashboard');
                }

                // var_dump($postid);

            }else{
                if($request->hasFile('uploadprop')){
                    $filenameWithExt = $request->file('uploadprop')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('uploadprop')->getClientOriginalExtension();
                    $fileNameToStore = $filename.'.'.$extension;
                    $path = $request->file('uploadprop')->storeAs('public/proposal', $fileNameToStore);
                } else {
                    $fileNameToStore ='';
                }
                
                $ans = DB::table('research_papers')->select('proposal')->where('user_id','=',Auth::user()->id)->count();
                if($extension == 'docx' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'pptx' || $extension == 'xls'){
                    session()->flash('errorsss');
                    return redirect()->back();
                }else{
                    if($ans < 1)
                        {
                            $upload = new research_papers;
                            $upload->proposal = $fileNameToStore;
                            $upload->user_id = auth()->user()->id;
                            $upload->title = $request->input('ptitle');
                            $upload->adviser = $request->input('adviser');
                            $upload->dateproposal = Carbon::today();
                            $upload->save();

                            $ipd = research_papers::orderBy('created_at','DESC')->where('user_id',Auth::user()->id)->take(1)->value('id');

                            if($request->hasFile('uploadprop')){
                                $filenameWithExt = $request->file('uploadprop')->getClientOriginalName();
                                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                                $extension = $request->file('uploadprop')->getClientOriginalExtension();
                                $fileNameToStore = $ipd.'.'.$extension;
                                $path = $request->file('uploadprop')->storeAs('public/proposal', $fileNameToStore);
                            } else {
                                $fileNameToStore ='';
                            }

                            $upd = research_papers::find($ipd);
                            $upload->proposal = $fileNameToStore;
                            $upd->save();
                
                            $logs = new logs;
                            $logs->user_id = auth()->user()->id;
                            $logs->type= "proposal";
                            $logs->status= "unread";
                            $logs->save();
                
                            $pdfFilePath = 'storage/proposal/'.$fileNameToStore; 
                
                            session()->flash('success','Uploaded successfully!');
                            return redirect('/user-dashboard');
                        }
                        else{
                            session()->flash('error');
                            return redirect('/user-dashboard');
                        }
                }
            }
        }
       
    }
    public function show()
    {
        $proposals = DB::table('research_papers')->where('proposal_status','!=','archive')->get();
        $uploads = DB::table('research_papers')->join('users','users.id','=','research_papers.user_id')->get();
        $users = DB::table('users')->get();
        return view('admindash.proposaltable',compact('uploads','users'))->with(['proposals'=>$proposals,'users'=>$users]);
    }
    public function manuscript(Request $request)
    {
        $title = 'Manuscript';

        $search = $request->input('rnumber');
        $manuscript = DB::table('research_papers')->get();
        $proposal = DB::table('research_details')->get();
        $result = DB::table('research_papers',compact('manuscript'))->select('id')->where('user_id','=',Auth::user()->id)->value('id');
        $prop = research_papers::where('user_id',Auth::user()->id)->value('id');
        $pstat = research_papers::find($prop);
        if($result == $search)
        {
            return view('userdash.uploadmanuscript', compact('pstat','title','manuscript'));
        }else{
            session()->flash('wrong');
            return redirect()->back();
        }
    }
    public function update(Request $request)
    {
        if($request->hasFile('uploadmanu') == false || $request->hasFile('uploadabs') == false || $request->input('title') == null || $request->input('tags') == null){
            session()->flash('require');
            return redirect()->back();
        }else{
            $title = 'manuscript';
            $result = DB::table('research_papers',compact('manuscript'))->select('id')->where('user_id','=',Auth::user()->id)->value('id');
            $upload = research_papers::find($result);
            
            if($request->hasFile('uploadmanu') || $request->hasFile('uploadabs')){
                $filenameWithExt = $request->file('uploadmanu')->getClientOriginalName();
                $filenameExt = $request->file('uploadabs')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $fileabstract = pathinfo($filenameExt, PATHINFO_FILENAME);
                $extension = $request->file('uploadmanu')->getClientOriginalExtension();
                $ext = $request->file('uploadabs')->getClientOriginalExtension();
                $fileNameToStore = $upload->id.'.'.$extension;
                $fileNameStore = $upload->id.'.'.$ext;
                $path = $request->file('uploadmanu')->storeAs('public/manuscript', $fileNameToStore);
                $path = $request->file('uploadabs')->storeAs('public/abstract',$fileNameStore);
            } else {
                $fileNameToStore ='';
                $fileNameStore='';
                
            }

            if($extension == 'docx' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'pptx' || $extension == 'xlsx' || $ext == 'docx' || $ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'pptx' || $ext == 'xlsx'){
                session()->flash('error');
                return redirect()->back();
            }else{
                $upload->title = $request->input('title');
                $upload->manuscript = $fileNameToStore;
                $upload->abstract = $fileNameStore;
                $upload->datemanuscript = Carbon::today();
                $upload->save();

                $pdfFilePath = 'storage/manuscript/'.$fileNameToStore;
                
                $PDFParser = new Parser(); 
                $pdf = $PDFParser->parseFile($pdfFilePath);  
                $text = $pdf->getText();

                $logs = new logs;
                $logs->user_id = auth()->user()->id;
                $logs->type= "manuscript";
                $logs->status= "unread";
                $logs->save();

                $db = new research_details();
                $db->researchid = $result;
                $db->researchBody = $text;
                $db->save();

                $tag = Input::get('tags');
                    $tags = new tags;
                    $tags->tagname = $tag;
                    $tags->researchid = $result;
                    $tags->save();
            
                return redirect('/user-dashboard');
            }
        }
    }
    public function sendMail(Request $request, $id)
    {
        // $email = User::findorfail($id);
        // \Mail::to($email->email)->send(new SendNumber($id));

        // $data = $request->all();
        // $feedback = $data['feedback'];

        // $comment = new approvecomment;
        // $comment->user_id = auth()->user()->id;
        // $comment->reciever_id = $id;
        // $comment->description = $feedback;
        // $comment->save();

        $research_no = DB::table('research_papers')->where('user_id',$id)->value('id');
        $research = research_papers::find($research_no);
        $research->proposal_status = "approved";
        $research->checked_by = Auth::user()->id;
        $research->dateapproved = Carbon::today();
        $research->save();

        // var_dump($feedback);
        session()->flash('success');
        return redirect()->back();
    }
    public function sendRevision(Request $request, $id){
        // $data = $request->all();
        // $feedback = $data['feedback'];

        // $email = User::find($id);
        // \Mail::to($email->email)->send(new SendRevision($cons));

        // $comment = new sendrevisioncomment;
        // $comment->user_id = auth()->user()->id;
        // $comment->reciever_id = $id;
        // $comment->description = $feedback;
        // $comment->save();

        // $cons = ['id'=>$id,'feedback'=>$feedback];

        $research_no = DB::table('research_papers')->where('user_id',$id)->value('id');
        $research = research_papers::find($research_no);
        $research->proposal_status = "needs revision";
        $research->checked_by = Auth::user()->id;
        $research->save();
        
        session()->flash('success');
        return redirect()->back();
        // var_dump($cons['feedback']);
    }
    public function showManu()
    {
        $proposals = DB::table('research_details')->join('research_papers','research_papers.id','=','research_details.researchid')
                    ->where('proposal_status','=','approved')->get();
        $tags = DB::table('tags')->get();
        $uploads = DB::table('research_papers')->join('users','users.id','=','research_papers.user_id')->get();
        $users = DB::table('users')->get();
        return view('admindash.manuscripttable',compact('uploads','users','tags','filePath'))->with(['proposals'=>$proposals,'users'=>$users]);
    }
    public function editTags($id)
    {
        $document = research_papers::findOrFail($id);
        $filePath = 'storage/manuscript/'.$document->manuscript;

        $tags = DB::table('tags')->where('researchid','=',$id)->get();
        $tag_id = DB::table('tags')->where('researchid','=',$id)->value('id');
        $research_id = DB::table('tags')->where('researchid','=',$id)->value('researchid');

        return view('admindash.edittags',compact('filePath','tag_id','tags','research_id','document'));
    }
    /**
     * Update a created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatetags(Request $request){
        // $this->validate($request,[
        //     'tags'=>'required', 
        // ]);
        $id = $request->input('tag_id');
        
        if($id == null){
            $tags = new tags;
            $tags->tagname = $request->input('tags');
            $tags->researchid = $request->input('research_id');
            $tags->save();
        }
        else{
            $tags = tags::find($id);
            $tags->tagname = $request->input('tags');
            $tags->researchid = $request->input('research_id');
            $tags->save();
        }

        return redirect()->back();
    }
    public function addArchive()
    {
        return view('admindash.addarchive');
    }
    public function showArchive()
    {
        $proposals = DB::table('research_details')->join('research_papers','research_papers.id','=','research_details.researchid')
                     ->where('proposal_status','=','archive')->get();
        $tags = DB::table('tags')->get();
        $uploads = DB::table('research_papers')->join('users','users.id','=','research_papers.user_id')->get();
        $users = DB::table('users')->get();
        return view('admindash.archivetable',compact('uploads','users','tags'))->with(['proposals'=>$proposals,'users'=>$users]);
    }
    public function storeArchive(Request $request){
        // $this->validate($request,[
        //     'research_number'=>'required',
        //     'title'=>'required',
        //     'author'=>'required',
        //     'tags'=>'requried',
        // ]);

        if($request->hasFile('uploadmanu') || $request->hasFile('uploadabs')){
            $filenameWithExt = $request->file('uploadmanu')->getClientOriginalName();
            $filenameExt = $request->file('uploadabs')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileabstract = pathinfo($filenameExt, PATHINFO_FILENAME);
            $extension = $request->file('uploadmanu')->getClientOriginalExtension();
            $ext = $request->file('uploadabs')->getClientOriginalExtension();
            $fileNameToStore = $filename.'.'.$extension;
            $fileNameStore = $fileabstract.'.'.$ext;
            $path = $request->file('uploadmanu')->storeAs('public/manuscript', $fileNameToStore);
            $path = $request->file('uploadabs')->storeAs('public/abstract',$fileNameStore);
        } else {
            $fileNameToStore ='';
            $fileNameStore='';
            
        }

        if($extension == 'docx' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'pptx' || $extension == 'xls' || $ext == 'docx' || $ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'pptx' || $ext == 'xls'){
            session()->flash('errorsss');
            return redirect()->back(); 
        }else{
            $upload = new research_papers;
            $upload->id = $request->input('research_number');
            $upload->abstract = $fileNameStore;
            $upload->manuscript = $fileNameToStore;
            $upload->user_id = auth()->user()->id;
            $upload->title = $request->input('title');
            $upload->proposal_status = 'archive';
            $upload->save();

            $pdfFilePath = 'storage/manuscript/'.$fileNameToStore;
            
            $PDFParser = new Parser(); 
            $pdf = $PDFParser->parseFile($pdfFilePath);  
            $text = $pdf->getText();

            $db = new research_details();
            $db->researchid = $request->input('research_number');
            $db->researchBody = $text;
            $db->save();

            $tags = new tags;
            $tags->tagname = $request->input('tags');
            $tags->researchid = $request->input('research_number');
            $tags->save();

            session()->flash('success');
            return redirect()->back();
        }
    }
}
