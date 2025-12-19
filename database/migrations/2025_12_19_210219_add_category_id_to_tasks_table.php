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
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('category_id')
                  ->nullable() // Pode ser nulo por enquanto (para não quebrar tarefas antigas)
                  ->constrained() // Liga automaticamente com a tabela 'categories'
                  ->onDelete('set null'); // Se apagar a categoria, a tarefa fica sem categoria (não apaga a tarefa)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
};
