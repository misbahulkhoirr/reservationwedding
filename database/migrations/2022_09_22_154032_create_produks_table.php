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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('kategori_id');
            $table->string('name');
            $table->integer('harga');
            $table->string('ketersediaan');
            $table->string('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamp('publish_at')->nullable(); // timestamp(tipedata) untuk membuat kapan postingan di publish
            $table->timestamps(); // timestamps(untuk created_at dan updated_at) untuk melihat kapan postingan di buat
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
