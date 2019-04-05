<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateUplodedProposalToResearchPapers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('research_papers', function($table){
            $table->date('dateproposal');
            $table->date('datemanuscript');
            $table->date('dateapproved');
        });
     }
 
     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('research_papers', function($table){
             $table->dropcolumn('dateproposal');
             $table->dropcolumn('datemanuscript');
             $table->dropcolumn('dateapproved');
         }); 
     }
}
