<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use DB;
use App\User;
use App\logs;
use App\colleges;
use App\programs;
use App\research_papers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="Register";
        $col =  DB::table('colleges')->get();
        $prog = DB::table('programs')->get();
        return view('auth.register',compact('title','col','prog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'fname' => 'required|string|max:255',
            'sname' => 'required|string|max:255',
            'minitial' => 'required|string|max:2',
            'email' => 'required|string|email|max:255|unique:users',
            'studentid' => 'required|string|max:11|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);

        /* Profile Picture Get Info */
        if($request->hasFile('profilepic')){
            $filenameWithExt = $request->file('profilepic')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profilepic')->getClientOriginalExtension();
            $fileNameToStore = $filename.'.'.$extension;
            $path = $request->file('profilepic')->storeAs('public/profilepic', $fileNameToStore);
        } else {
            $fileNameToStore ='noimage.png';
        }
        /* End of Profile Picture */


        $user = new User;
        $user->fname = $request->input('fname');
        $user->sname = $request->input('sname');
        $user->minitial = $request->input('minitial').".";
        $user->email = $request->input('email');
        // $user->programid = $request->input('progid');
        $sep = Input::get('progid');
        $sepa = explode(',',$sep);
        $user->collegeid = $sepa[0];
        $user->programid = $sepa[1];
        $user->role = '1';
        $user->status = 'active';
        $user->profilepic = $fileNameToStore;
        
        // $program = DB::table('programs')->get();
        // $pro = DB::table('programs')->value('collegeid');
        // foreach(count($program) as $prog){
        //     if($request->input('progid') == $pro->id){
        //         $user->programid = $program->collegeid;
        //     }
        // }

        $user->studentid = $request->input('studentid');
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        $userid = User::orderBy('id', "DESC")->take(1)->value('id');

        // if(isset($id)){
            $logs = new logs;
            $logs->user_id = $userid;
            $logs->type= "register";
            $logs->status= "unread";
            $logs->save();  
        // }
        
        session()->flash('registered');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->status = 'deactivated';
        $user->save();

        return redirect()->back();
    }
    public function recover($id){
        $user = User::find($id);
        $user->status = 'active';
        $user->save();

        return redirect()->back();
    }

    public function showUsers(){
        $title="Users";
        $users = User::where('status','active')->get();

        $colleges = colleges::join('programs','colleges.id','programs.collegeid')->get();

        return view('admindash.Users.userstable',compact('title','users','colleges'));
    }
    public function createUser(){
        if(auth()->user()->role == 0){
            $title = "Create User";
            return view('admindash.Users.adduser',compact('title'));
        }else{
            return redirect()->back();
        }
    }
    public function storeUser(Request $request){
        if(auth()->user()->role == 0){
            $this->validate($request,[
                'fname' => 'required|string|max:255',
                'sname' => 'required|string|max:255',
                'minitial' => 'required|string|max:2',
                'email' => 'required|string|email|max:255|unique:users',
                'position' => 'required|string',
                'password' => 'required|string|min:6|confirmed',
            ]);
            $userData = $request->all();
    
            $data = $userData['position'];
            $cut = explode(',',$data);
    
            $user = new User;
            $user->fname = $request->input('fname');
            $user->sname = $request->input('sname');
            $user->minitial = $request->input('minitial');
            $user->studentid = mt_rand(2018300,9999999);
            $user->email = $userData['email'];
            $user->password = Hash::make($userData['password']);
            $user->position = $cut[1];
            $user->role = $cut[0];
            $user->profilepic = "noimage.png";
            $user->status = 'active';
            $user->save();
    
            return redirect('/users');
        }else{
            return redirect()->back();
        }
    }
    public function viewAccount(){
        $title="Account";
        $prop = research_papers::where('user_id',Auth::user()->id)->value('id');
        $pstat = research_papers::find($prop);
        $fullname = auth()->user()->fname.' '.auth()->user()->minitial.' '.auth()->user()->sname;
        return view('admindash.Users.viewaccount',compact('pstat','title','fullname'));
    }
    public function userProfile(){
        $title="Account";
        $prop = research_papers::where('user_id',Auth::user()->id)->value('id');
        $pstat = research_papers::find($prop);
        $fullname = auth()->user()->fname.' '.auth()->user()->minitial.' '.auth()->user()->sname;
        return view('userdash.viewaccount',compact('pstat','title','fullname'));
    }
    public function userEmailUpdate(Request $request){
        $this->validate($request,[
            'email'=>'required|string|email|unique:users'
        ]);

        $user = User::find(Auth::user()->id);
        $user->email = $request->input('email');
        $user->save();
        
        // var_dump($user->email);
        // var_dump($request->input('new_email'));
        return redirect()->back();
    }
    public function updateAccount(Request $request){
        $this->validate($request,[
            'fname' => 'required|string|max:255',
            'sname' => 'required|string|max:255',
            'minitial' => 'required|string',
            'position' => 'required|string',
        ]);
        $id=auth()->user()->id;
        $user = User::find($id);
        $user->fname = $request->input('fname');
        $user->sname = $request->input('sname');
        $user->minitial = $request->input('minitial');
        $user->email = $request->input('email');
        $user->position = $request->input('position');
        $user->save();

        return redirect()->back();
    }
    public function changepwd(Request $request){
        $this->validate($request,[
            'oldpassword'=>'required',
            'password'=>'required|string|min:6|confirmed',
        ]);
        
        $oldie = $request->input('oldpassword');

        if(Hash::check($oldie, Auth::user()->password) == Auth::user()->password){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->input('password'));
            $user->save();

            session()->flash('success');
            return redirect()->back();
        }
        else{
            session()->flash('error');
            return redirect()->back();
        }
    }
    public function viewDeletedUser(){
        $title = "Deleted Accounts";
        $users = User::all()->where('status','deactivated');
        return view('admindash.Users.viewdeletedacct',compact('title','users'));
    }
    public function uploadProfilepic(Request $request){
        $this->validate($request,[
            'profilepic'=>'nullable|max:999999',
        ]);

        if($request->hasFile('profilepic')){
            $filenameWithExt = $request->file('profilepic')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profilepic')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('profilepic')->storeAs('public/profilepic', $fileNameToStore);
        } else {
            $fileNameToStore ='noimage.png';
        }

        $user = User::find(auth()->user()->id);
        $user->profilepic = $fileNameToStore;
        $user->save();

        return redirect()->back();
    }
}
