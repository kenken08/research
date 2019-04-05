<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\messages;
use App\messagesdetails;
use App\User;
use App\announcements;
use App\research_papers;

class MessagesController extends Controller
{
    public function index(){
        $title = "Messages";
        $messages = messages::orderBy('updated_at','DESC')->get();
        return view('admindash.messages.messages',compact('title','messages'));
    }
    public function sendMessage(Request $request){
        $data = $request->except('_token');

        $mess = messages::where('sender_id',Auth::user()->id)->value('id');
        $mess_id = messages::find($mess);
        if($mess_id != null){
            $messdetails = new messagesdetails;
            $messdetails->message_id = $mess_id->id;
            $messdetails->sender_id = Auth::user()->id;
            $messdetails->message = $data['sender_message'];
            $messdetails->status ='unread';
            $messdetails->save();

            session()->flash('success');
            return redirect()->back();
        }else{
            $message = new messages;
            $message->sender_id = Auth::user()->id;
            $message->save();

            $messageid = messages::orderBy('created_at','DESC')->take(1)->value('id');

            $messdetails = new messagesdetails;
            $messdetails->message_id = $messageid;
            $messdetails->sender_id = Auth::user()->id;
            $messdetails->message = $data['sender_message'];
            $messdetails->status ='unread';
            $messdetails->save();

            session()->flash('success');
            return redirect()->back();
        }
    }
    public function showMessages($id){
        $title="Messages";
        $unreads = messagesdetails::where('message_id',$id)->get();
        $mid = $id;
        foreach($unreads as $un){
            $upunread = messagesdetails::find($un->id);
            $upunread->status = 'read';
            $upunread->save(); 
        }

        $messages = messages::orderBy('updated_at','DESC')->get();
        $mes = messagesdetails::where('message_id',$id)->orderBy('created_at','DESC')->get();
        $mi = messages::where('id',$id)->value('sender_id');
        $fname = User::where('id',$mi)->value('fname');
        return view('admindash.messages.messages',compact('title','messages','mes','mid','fname'));
    }
    public function replyTo(Request $request,$id){
        $data = $request->except('_token');

        $messdetails = new messagesdetails;
        $messdetails->message_id = $request->input('mid');
        $messdetails->sender_id = Auth::user()->id;
        $messdetails->message = $request->input('reply_message');
        $messdetails->status ='read';
        $messdetails->sender_status ='0';
        $messdetails->save();

        session()->flash('success');
        return redirect('/messages');
    }
    public function announce(){
        $title ="Announcement";
        $announcements = announcements::orderBy('created_at','DESC')->get();
        return view('admindash.announcements.announce-index',compact('title','announcements'));
    }
    public function addAnnounce(Request $request){
        $this->validate($request, [
            'atitle'=>'required',
            'adescription'=>'required',
            'uploadcover'=>'required|image'
        ]);

        if($request->hasFile('uploadcover')){
            $filenameWithExt = $request->file('uploadcover')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('uploadcover')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('uploadcover')->storeAs('public/cover_photo', $fileNameToStore);
        } else {
            $fileNameToStore ='noimage.png';
        }

        $announce = new announcements;
        $announce->user_id = Auth::user()->id;
        $announce->title = $request->input('atitle');
        $announce->description = $request->input('adescription');
        $announce->cover_photo = $fileNameToStore;
        $announce->save();

        session()->flash('success');
        return redirect()->back();
    }
    public function userindex(){
        $title = "Messages";
        $prop = research_papers::where('user_id',Auth::user()->id)->value('id');
        $pstat = research_papers::find($prop);

        $mid = messages::where('sender_id',Auth::user()->id)->value('id');
        $messages = messagesdetails::orderBy('updated_at','DESC')->where('message_id',$mid)->get();
        return view('userdash.messages.messages',compact('title','messages','pstat'));
    }
}
