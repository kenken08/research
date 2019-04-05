<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\research_papers;
use Illuminate\Support\Facades\DB;

class SendRevision extends Mailable
{
    use Queueable, SerializesModels;
    protected $res_id;
    // protected $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($lahini)
    {
        $iyangid = DB::table('research_papers')
                    ->where('user_id',$lahini['id'])->get();
        $filepath = 'guidelinesforthesis.pdf'; 
        $user = \App\User::where('id',$lahini['id'])->value('fname');

        $this->filepath = $filepath;
        $this->fullname = $user;
        $this->res_id = $iyangid;
        $this->feed = $lahini['feedback'];;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admindash.sendrevision')->with(['feed'=>$this->feed,'lahini'=> $this->res_id,'fullname'=>$this->fullname,'filepath'=>$this->filepath]);
    }
}
