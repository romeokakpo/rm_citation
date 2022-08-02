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
            $table->string('email')->unique()->default('');
            $table->string('telephone')->default('+229 91 98 59 34');
            $table->string('facebook')->default('#');
            $table->string('twitter')->default('#');
            $table->string('instagram')->default('#');
            $table->string('linkedin')->default('#');
            $table->string('picture')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(Hash::make('adminer'));
            $table->string('adresse')->default('Bidossessi, Abomey-Calavi, Bénin');
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
