<?php

namespace App\Http\Controllers;
use Auth;
use app\user;
use DB;
use App\research_papers as rs;
use App\Mail\SendNumber;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->role == 0 || auth()->user()->role == 2){
            $users = User::all();
            $manus = rs::join('users','users.id','=','research_papers.user_id')->get();
            $uploads = DB::table('research_papers')->get();            
            $title='Admin';
            return view('admindash.dashboard', compact('title','users','manus','uploads'));
        } else {
            return redirect('/');
        }
       
    }
}
