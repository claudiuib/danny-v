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
        Schema::table('contact_infos', function (Blueprint $table) {
            $table->text('bullet_1')->nullable()->after('description');
            $table->text('bullet_2')->nullable()->after('bullet_1');
            $table->text('bullet_3')->nullable()->after('bullet_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_infos', function (Blueprint $table) {
             $table->dropColumn(['bullet_1', 'bullet_2', 'bullet_3']);
        });
    }
};
