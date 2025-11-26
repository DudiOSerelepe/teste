<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->string('imagem')->nullable()->after('categoria_id');
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->string('imagem')->nullable()->after('telefone');
        });
    }

    
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('imagem');
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('imagem');
        });
    }
};
