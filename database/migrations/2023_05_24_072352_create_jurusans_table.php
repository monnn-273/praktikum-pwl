<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->unsignedBigInteger("fakultas_id");
            $table->foreign("fakultas_id")
                  ->references("id")
                  ->on("fakultas")
                  ->onUpdate("CASCADE")
                  ->onDelete("RESTRICT");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};
