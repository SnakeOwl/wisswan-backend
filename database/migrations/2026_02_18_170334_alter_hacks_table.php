<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hacks', function (Blueprint $table) {
            // Check if the 'phone' column exists before dropping it
            foreach (['domen', 'subdomen', 'group'] as $column) {
                if (Schema::hasColumn('hacks', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hacks', function (Blueprint $table) {
            $table->string('domen')->nullable();
            $table->string('subdomen')->nullable();
            $table->string('group')->nullable();
        });
    }
};
