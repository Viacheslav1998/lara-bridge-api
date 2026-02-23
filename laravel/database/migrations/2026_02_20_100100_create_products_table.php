<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->string('name')->index();
            $table->string('type')->index();
            $table->decimal('price', 12, 2)->index();
            $table->unsignedInteger('count')->default(0);
            $table->string('country_origin')->nullable();
            $table->smallInteger('year')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedTinyInteger('assessment')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
