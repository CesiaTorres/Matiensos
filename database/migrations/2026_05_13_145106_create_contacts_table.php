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
    Schema::create('contacts', function (Blueprint $table) {
        $table->id();
        
        // La clave de tu requerimiento: nullable() permite que el user_id esté vacío (invitados).
        // Si un usuario registrado borra su cuenta, 'set null' mantiene el mensaje de contacto intacto.
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
        
        // Datos del remitente (Obligatorios siempre. Si está logueado, tu frontend los autocompletará)
        $table->string('name', 100);
        $table->string('email');
        
        // Contenido del mensaje
        $table->string('subject')->nullable();
        $table->text('message');
        
        // Para que el Admin sepa si ya leyó o respondió el mensaje
        $table->boolean('is_read')->default(false); 
        
        $table->timestamps();
        $table->softDeletes(); // Útil por si el admin borra un mensaje pero quiere tener una "papelera"
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
