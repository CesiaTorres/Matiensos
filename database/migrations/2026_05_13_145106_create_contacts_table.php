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
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
        $table->string('name', 100);
        $table->string('email');
        $table->string('subject')->nullable();
        $table->text('message');
        $table->boolean('is_read')->default(false); 
        
        $table->timestamps();
        $table->softDeletes();
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
