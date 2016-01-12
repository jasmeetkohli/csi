<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_versions', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->integer('version_number')->unsigned();
            $table->string('version_path',500);
            $table->bigInteger('proposal_id')->unsigned();
            $table->tinyInteger('research_status')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('proposal_id')
                    ->references('id')->on('proposals')
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
        Schema::drop('proposal_versions');        
    }
}
