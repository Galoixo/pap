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
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->id('id');
            $table->string('nome');
            $table->tinyInteger('tipo_vinho');
            // 0 = nigga
            // 1 = macaco preto nigga monky ass nigger
            $table->integer('preco');
            $table->text('descricao');
            $table->integer('qnt_stock');
            $table->boolean('ispack');
            $table->integer('ano_colheita');
            $table->string('imagem');
            $table->timestamps();
        });

        Schema::create('encomenda', function (Blueprint $table) {
            $table->id('id');
            $table->dateTime('nome',);
            $table->tinyInteger('estado');
        });

        Schema::create('promocoes', function (Blueprint $table) {
            $table->id('id');
            $table->tinyInteger('desconto_percentual');
            $table->date('data_inicio',);
            $table->text('motivo');
        });

        Schema::create('avaliacao', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')->on('produto');
            $table->text('texto');
        });

        // Schema::create('imagem', function (Blueprint $table) {
        //     $table->id('id');
        //     $table->unsignedBigInteger('produto_id');
        //     $table->foreign('produto_id')->references('id')->on('produto');
        //     $table->string('ficheiro');
        // });

        Schema::create('produto_por_promocao', function (Blueprint $table) {
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');
            $table->unsignedBigInteger('promocao_id');
            $table->foreign('promocao_id')->references('id')->on('promocoes')->onDelete('cascade');
        });
        
        Schema::create('produto_por_encomenda', function (Blueprint $table) {
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');
            $table->unsignedBigInteger('encomenda_id');
            $table->foreign('encomenda_id')->references('id')->on('encomenda')->onDelete('cascade');
            $table->tinyInteger('qnt');
            $table->decimal('preco');
            $table->decimal('desconto');
            $table->decimal('portes_envio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto');
        Schema::dropIfExists('encomenda');
        Schema::dropIfExists('promocoes');
        Schema::dropIfExists('avaliacao');
        Schema::dropIfExists('produto_por_promocao');
        Schema::dropIfExists('produto_por_encomenda');

    }
};
