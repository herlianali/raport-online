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
        Schema::create('nilais', function (Blueprint $table) {
            $table->string('id_nilai',20)->primary();
            $table->string('nis_id',20)->unique();
            $table->string('kelas_id',20)->unique();
            $table->string('mapel_id',20);
            $table->string('smtr',20);
            $table->string('nilai_smtr',10);
            $table->timestamps();

            $table->foreign('nis_id')->references('nis')->on('siswas')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id_kelas')->on('kelas')->onDelete('cascade');
            $table->foreign('mapel_id')->references('id_mapel')->on('mapels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilais');
    }
};
