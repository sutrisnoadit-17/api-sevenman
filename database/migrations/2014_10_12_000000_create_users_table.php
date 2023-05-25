<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('username')->unique();
            $table->string('email');
            $table->string('fullName');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::unprepared('DROP PROCEDURE IF EXISTS checkUser');
        DB::unprepared('
            CREATE PROCEDURE checkUser(IN argNim VARCHAR(200),IN argPaswd VARCHAR(200),IN argEmail VARCHAR(200),IN argFullName VARCHAR(200))
            BEGIN
            INSERT INTO users (username,password,email,fullName) 
                SELECT * FROM (SELECT argNim,argPaswd,argEmail,argFullName) AS tmp
                     WHERE NOT EXISTS(
                            SELECT username FROM users WHERE (
                                username = argNim)
                                ) LIMIT 1;
            END
        ');
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        
    }
};
