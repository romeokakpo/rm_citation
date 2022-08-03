<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
            $table->string('name')->default('Romaindo Miracle');
            $table->string('email')->unique()->default('rromaine260@gmail.com');
            $table->string('telephone')->default('+229 XX XX XX XX');
            $table->string('facebook')->default('https://www.facebook.com/romaidomiracle.mahoulikponto');
            $table->string('twitter')->default('https://mobile.twitter.com/RomaineRomaine7');
            $table->string('instagram')->default('https://www.instagram.com/romaindo_miracle/');
            $table->string('picture')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(Hash::make('adminer'));
            $table->string('adresse')->default('Cotonou, Bénin');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
