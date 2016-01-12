<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('proposals', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->string('field',254);
            $table->string('title',254);
            $table->integer('team_members')->unsignd();
            $table->string('research_place',254);
            $table->date('end_date_of_proposal');
            $table->integer('proposed_amount')->unsigned();
            $table->string('description',1024);
            $table->bigInteger('userid')->unsigned();
            $table->date('date_of_approval');
            $table->integer('granted_amount')->unsignd()->nullable();
            
           
            $table->timestamps();

            $table->foreign('userid')
                    ->references('id')->on('members')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

        }); 
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
              Schema::drop('proposals');  
    }
}
