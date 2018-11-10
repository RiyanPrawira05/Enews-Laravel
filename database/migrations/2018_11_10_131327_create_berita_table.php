<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul', 100);
            $table->text('header',100)->nullable()->comment('Gambar Berita');
            $table->text('isi', 100);
            $table->integer('user_id')->comment('Kolom Dibuat Oleh');
            $table->integer('kategori_id')->comment('Kolom Kategori Berita\nOtomatis terisi oleh User id yang login');
            $table->enum('status', ['0','1'])->comment('Status: 0 Draft, 1 Publish');
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
        Schema::dropIfExists('berita');
    }
}
