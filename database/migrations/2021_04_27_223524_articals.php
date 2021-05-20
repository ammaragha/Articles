<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Articals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articals',function (Blueprint $table)
        {
            $table->id();
            $table->string('name',20);
            $table->string('description');
            $table->string('content');
            $table->string('img')->nullable();
            $table->timestamps();
            
            $table->foreignId('userID')->constrained('users')->onDelete('cascade');

            $table->foreignId('catID')->constrained('catigories')->onDelete('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
