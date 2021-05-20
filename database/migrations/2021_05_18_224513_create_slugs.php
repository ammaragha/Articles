<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlugs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slugs', function (Blueprint $table) {
            $table->id();
            $table->String('slugName');
            $table->string('content')->nullable();
            $table->timestamps();
        });

        DB::table('slugs')->insert(
            [
                [
                    'slugName'=>'About'
                ],[
                    'slugName'=>'Facebook'
                ],[
                    'slugName'=>'Twitter'
                ],[
                    'slugName'=>'Dribbble'
                ],[
                    'slugName'=>'Google+'
                ],[
                    'slugName'=>'Instagram'
                ],


            ]

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slugs');
    }
}
