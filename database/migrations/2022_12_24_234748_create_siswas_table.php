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
        Schema::create('siswas', function (Blueprint $table) {
            $table->string('nis',20)->unique()->primary();
            $table->string('nisn',20)->nullable()->unique();
            $table->string('nama',150);
            $table->date('tgl_lahir');
            $table->string('tpt_lahir',30);
            $table->string('alamat');
            $table->string('foto');
            $table->char('jenis_kelamin',1);
            $table->string('tlp',20);
            $table->string('kelas_id',20)->unique();
            $table->string('password',100);
            $table->timestamps();

            $table->foreign('kelas_id')->references('id_kelas')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
};
