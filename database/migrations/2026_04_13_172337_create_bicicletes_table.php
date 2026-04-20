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
    Schema::create('bicicletes', function (Blueprint $table) {
        $table->id();
        $table->string('nom', 100);
        $table->text('descripcio')->nullable();
        $table->decimal('preu_dia', 8, 2);
        $table->boolean('disponible')->default(true);
        $table->string('imatge')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bicicletes');
    }
};
