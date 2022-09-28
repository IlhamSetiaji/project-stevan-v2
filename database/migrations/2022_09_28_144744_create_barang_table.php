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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('condition_id')->constrained('conditions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('room_id')->constrained('rooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('keterangan_id')->constrained('keterangan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->char('kode_barang')->unique();
            $table->string('nama_barang');
            $table->year('tahun_perolehan');
            $table->string('nup');
            $table->string('merk');
            $table->integer('kuantitas');
            $table->integer('harga_satuan_barang');
            $table->integer('harga');
            $table->enum('penggunaan', ['Sendiri', 'Pihak Ketiga']);
            $table->string('dokumentasi');
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
        Schema::dropIfExists('barang');
    }
};
