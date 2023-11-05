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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->tinyInteger('category_id');
            $table->string('thumbnail');
            $table->integer('quantity')->default(0);
            $table->decimal('price', 16, 2);
            $table->string('discount')->nullable();
            $table->decimal('discount_price', 16, 2)->nullable();
            $table->longText('description')->nullable();
            $table->tinyInteger('is_feature')->nullable()->default(0);
            $table->tinyInteger('just_for_you')->nullable()->default(0);
            $table->text('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->tinyInteger('status')->nullable(1);
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
