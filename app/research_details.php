<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class research_details extends Model
{
    protected $table = 'research_details';
    protected $searchable = ['researchBody'];
}
