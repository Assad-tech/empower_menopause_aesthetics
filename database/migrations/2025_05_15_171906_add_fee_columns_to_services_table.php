<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('service_number')->nullable();
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('duration')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->decimal('tax', 10, 2)->nullable();
            $table->string('appt_location_type')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'service_number',
                'category',
                'type',
                'duration',
                'amount',
                'tax',
                'appt_location_type',
            ]);
        });
    }
};
