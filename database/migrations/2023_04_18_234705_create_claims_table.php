<?php

use App\Enums\{
    ClaimStatusEnum, ClaimTypeEnum
};
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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();

            $table->enum('type', ClaimTypeEnum::values());
            $table->string('description')->nullable()->default('');
            $table->date('date');
            $table->enum('status', ClaimStatusEnum::values())->default(ClaimStatusEnum::DRAFT->value);

            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
