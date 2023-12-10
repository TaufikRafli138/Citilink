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
        Schema::create('Tabel_Role', function (Blueprint $table) {
            $table->id();
            $table->integer('Role_id');
            $table->text('Nama_Role');
            $table->text('Deskripsi');
            $table->text('Akses');
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
        Schema::dropIfExists('_tabel__role');
    }
};
