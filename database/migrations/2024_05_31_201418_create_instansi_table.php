<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('instansi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kategori_instansi_id')->unsigned();
            $table->string('nama_resmi');
            $table->string('nama_singkatan');
            $table->string('logo')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('instagram')->nullable();
            $table->text('sejarah')->nullable();
            $table->timestamps();

            $table->foreign('kategori_instansi_id')->references('id')->on('kategori_instansi')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instansi');
    }
};