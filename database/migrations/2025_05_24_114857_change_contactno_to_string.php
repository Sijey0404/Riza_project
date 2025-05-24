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
        Schema::table('students', function (Blueprint $table) {
            // First drop the existing integer column
            $table->dropColumn('contactno');
        });

        Schema::table('students', function (Blueprint $table) {
            // Re-add as a string column
            $table->string('contactno', 20)->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // First drop the string column
            $table->dropColumn('contactno');
        });

        Schema::table('students', function (Blueprint $table) {
            // Re-add as an integer column
            $table->integer('contactno')->after('address');
        });
    }
};
