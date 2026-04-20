<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void {
    Schema::create('bicicleta_categoria', function (Blueprint $table) {
        $table->foreignId('bicicleta_id')->constrained('bicicletes')->onDelete('cascade');
        $table->foreignId('categoria_id')->constrained('categories')->onDelete('cascade');
        $table->primary(['bicicleta_id', 'categoria_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bicicleta_categoria');
    }
};
