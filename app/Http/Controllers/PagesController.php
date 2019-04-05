<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\colleges;
use App\programs;
use App\research_papers as Res;
use App\research_details;
use App\sendrevisioncomment;
use App\approvecomment;
use App\User;

class PagesController extends Controller
{
    public function home(){
        $colleges = colleges::all();
        $programs = programs::all();
        $title="Home";
        return view('welcome',compact('title','colleges','programs'));
    }
    public function login(){
        $title="Login";
        return view('auth.login',compact('title'));
    }
    public function Dash(){
        $title="Dashboard";
        $status = Res::where('user_id',Auth::user()->id)->value('proposal_status');
        $manu = Res::where('user_id',Auth::user()->id)->value('manuscript');
        $rs = Res::where('user_id',Auth::user()->id)->value('id');
        $proposal = Res::where('user_id',Auth::user()->id)->value('title');
        $colleges = colleges::all();
        $programs = programs::all();
        $manuscript = Res::where('manuscript','!=',null)->where('user_id',Auth::user()->id)->value('title');
        $prop = Res::where('user_id',Auth::user()->id)->value('id');
        $pstat = Res::find($prop);
        $users = User::all();

        $rcid = sendrevisioncomment::orderBy('created_at','DESC')->where('reciever_id',auth()->user()->id)->take(1)->value('id');
        $revisioncom = sendrevisioncomment::find($rcid);
        
        $cid = sendrevisioncomment::orderBy('created_at','ASC')->where('reciever_id',auth()->user()->id)->count();
        $t = ((int)$cid) - 1;
        $prevcom = sendrevisioncomment::orderBy('created_at','ASC')->where('reciever_id',auth()->user()->id)->take($t)->get();

        $appid = approvecomment::where('reciever_id',Auth::user()->id)->value('id');
        $approvecom = approvecomment::find($appid);

        if(Auth::user()->role==1){
            return view('userwelcome',compact('revisioncom','prevcom','approvecom','programs','users','pstat','title','status','manu','rs','proposal','manuscript','colleges'));
        }
    }
    public function about(){
        $title="About Us";
        return view('landingpage.about', compact('title'));
    }
    public function faq(){
        $title="FAQ";
        return view('landingpage.faq', compact('title'));
    }
    public function contact(){
        $title="Contact Us";
        return view('landingpage.contact',compact('title'));
    }
}
