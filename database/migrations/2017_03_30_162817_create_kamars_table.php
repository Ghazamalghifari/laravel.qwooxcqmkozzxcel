<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kelas')->nullable();
            $table->string('kode_bed');
            $table->string('nama_kamar')->nullable(); 
            $table->integer('tarif')->nullable()->default(0);
            $table->integer('tarif_2')->nullable()->default(0);
            $table->integer('tarif_3')->nullable()->default(0);
            $table->integer('tarif_4')->nullable()->default(0);
            $table->integer('tarif_5')->nullable()->default(0);
            $table->integer('tarif_6')->nullable()->default(0);
            $table->integer('tarif_7')->nullable()->default(0);
            $table->string('fasilitas')->nullable();
            $table->string('status')->nullable();
            $table->integer('jumlah_bed')->default(0);
            $table->integer('sisa_bed')->default(0);
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
        Schema::dropIfExists('kamars');
    }
}
