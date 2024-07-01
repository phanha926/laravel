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
        Schema::create('Music', function (Blueprint $tbl_music) {
            $tbl_music->id();
            $tbl_music->string("title", 255)->nullable();
            $tbl_music->text("description")->nullable();
            $tbl_music->string("location", 255)->nullable();
            $tbl_music->biginteger('music_id')->unsigned();
            $tbl_music->foreign('music_id')->references('id')->on('music');
            $tbl_music->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_music');
    }
};
