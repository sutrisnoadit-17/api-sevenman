<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lab_id')->nullable();
            $table->date("tgl_pinjam");
            $table->string('jam_pinjam');
            $table->boolean("on_acc")->default(0);
            $table->string("acc_by")->default("Super User");
            $table->unsignedBigInteger("item_id")->nullable();
            $table->unsignedBigInteger("user_id");
            $table->string("username");
            $table->string("loan_for");
            $table->string("note")->nullable();
            $table->boolean("is_already")->default(0);
            $table->foreign('lab_id')->references('id')->on('tb_labparent');
            $table->foreign('item_id')->references('id')->on('tb_item');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_models');
    }
};
