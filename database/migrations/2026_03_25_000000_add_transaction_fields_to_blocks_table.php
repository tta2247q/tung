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
        Schema::table('blocks', function (Blueprint $table) {
            $table->string('transaction_type')->nullable()->after('hash');
            $table->string('from_address')->nullable()->after('transaction_type');
            $table->string('to_address')->nullable()->after('from_address');
            $table->decimal('amount', 20, 8)->nullable()->after('to_address');
            $table->decimal('fee', 20, 8)->nullable()->after('amount');
            $table->text('description')->nullable()->after('fee');
            $table->string('status')->default('pending')->after('description');
            $table->integer('block_height')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blocks', function (Blueprint $table) {
            $table->dropColumn([
                'transaction_type',
                'from_address',
                'to_address',
                'amount',
                'fee',
                'description',
                'status',
                'block_height'
            ]);
        });
    }
};
