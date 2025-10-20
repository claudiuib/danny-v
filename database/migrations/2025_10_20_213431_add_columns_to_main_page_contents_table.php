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
        Schema::table('main_page_contents', function (Blueprint $table) {
            $table->string('section_name');
            $table->text('content');
            $table->text('services')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('main_page_contents', function (Blueprint $table) {
            $table->dropColumn(['section_name', 'content', 'services', 'sort_order', 'is_active']);
        });
    }
};
