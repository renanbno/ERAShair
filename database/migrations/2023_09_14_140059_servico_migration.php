<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {        Schema::create('usuarios', function (Blueprint $table) {
        $table->id();
        $table->string('nome', 80)->unique()->nullable(false);
        $table->string('descricao', 200)->nullable(false);   
        $table->integer('duracao', )->numeric()->nullable(false);
        $table->decimal('preco', )->decimal()->nullable(false);
       

        $table->timestamps();
    });
         
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servico');
    }
};
