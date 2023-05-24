<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nim');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::unprepared('DROP PROCEDURE IF EXISTS checkUser');
        DB::unprepared('
            CREATE PROCEDURE checkUser(IN argNim VARCHAR(200),IN argPaswd VARCHAR(200))
            BEGIN
            INSERT INTO users (nim,password) 
                SELECT * FROM (SELECT argNim,argPaswd) AS tmp
                     WHERE NOT EXISTS(
                            SELECT nim FROM users WHERE (
                                nim = argNim)
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
