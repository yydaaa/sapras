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
    Schema::create('siswas', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('status');
        $table->date('tanggal_masuk');
        $table->date('tanggal_keluar')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('siswas');
}
};
