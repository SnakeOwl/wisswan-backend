<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hacks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('domen')->nullable();
            $table->string('subdomen')->nullable();
            $table->string('group')->nullable();
            $table->boolean('is_global')->default(false);
            $table->text('title')->nullable();
            $table->longText('value');
            $table->unsignedInteger('rating')->default(0);
            $table->string('ip_last_updated', 45)->nullable();
            $table->foreignId('user_id')
                ->index()
                ->nullable()
                ->nullOnDelete();
            $table->string('shared_link')->unique()->nullable();
            $table->unsignedInteger('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hacks');
    }
};
