<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\research_papers;
use Illuminate\Support\Facades\DB;

class SendNumber extends Mailable
{
    
    use Queueable, SerializesModels;

    protected $res_id;
    
    /**
     * 
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($lahini)
    {   
        $iyangid = DB::table('research_papers')
                    ->where('user_id',$lahini)->get();

        $user = \App\User::where('id',$lahini)->value('fname');

        $this->fullname = $user;
        $this->res_id = $iyangid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admindash.sendnumber')->with(['lahini'=> $this->res_id,'fullname'=>$this->fullname]);
    }
}
