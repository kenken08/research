<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class research_papers extends Model
{
    protected $table='research_papers';
    protected $fillable =['user','title','adviser','proposal','proposal_status'];

    public function research(){
        return $this->belongsTo('App\User');
    }
}
