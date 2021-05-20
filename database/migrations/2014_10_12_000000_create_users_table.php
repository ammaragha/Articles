<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('role')->defult(0);
            $table->string('fName',10);
            $table->string('lName',10);
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('img')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $pass = Hash::make('admin00');

        DB::table('users')->insert(
            [
                'fName'=>'admin',
                'lName'=>'admin',
                'email'=>'admin@admin.com',
                'password'=>$pass,
                'role'=>'9'
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
        Schema::dropIfExists('users');
    }
}
