<?php

use App\Models\Domain;
use App\Models\Hack;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('domain_hack', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Hack::class);
            $table->foreignIdFor(Domain::class)
                ->constrained()
                ->cascadeOnDelete(); // Adds the ON DELETE CASCADE action;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains_hacks');
    }
};
