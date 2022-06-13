<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableOurPrograms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();    
            $table->string('description')->nullable();    
            $table->string('link_title')->nullable();    
            $table->string('link_description')->nullable();    
            $table->string('link')->nullable();    
            $table->string('picture')->nullable();    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('our_programs');
    }
}
