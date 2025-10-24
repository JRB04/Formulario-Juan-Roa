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
    public function up(): void
    {
        // 1. Abre el bloque Schema::create()
        Schema::create('contactos', function (Blueprint $table) { 
            
            // 2. TODAS las definiciones de columna deben ir aquí dentro
            $table->id();
            $table->string('nombre', 100);
            $table->string('correo', 100)->unique();
            $table->string('numero', 20)->nullable();
            $table->text('asunto');
            $table->timestamps();
            
        }); // 3. Cierra el bloque Schema::create() con el punto y coma final
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};