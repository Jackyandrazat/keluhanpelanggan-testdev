<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluhan_pelanggan', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('nama', 50);
            $table->string('email', 20);
            $table->integer('nomor_hp')->nullable();
            $table->boolean('flag_aktif')->default(true);
            $table->string('status_keluhan', 1)->default('0');
            $table->text('keluhan');

            $table->timestamps();

            $table->index('nama');
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keluhan_pelanggan');
    }
};
