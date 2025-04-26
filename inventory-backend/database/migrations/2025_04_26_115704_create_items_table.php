<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable(false);
            $table->text('description')->nullable();
            $table->bigInteger('price')->nullable(false); // Diubah dari integer ke bigInteger
            $table->foreignId('category_id')->nullable(false)->constrained()->onDelete('cascade');
            $table->foreignId('supplier_id')->nullable(false)->constrained()->onDelete('cascade');
            $table->foreignId('created_by')->nullable(false)->constrained('admins')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};