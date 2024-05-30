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
        Schema::table('psychologists', function (Blueprint $table) {
            $table->string('sipp')->nullable()->change();
            $table->string('str')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('psychologists', function (Blueprint $table) {
            $table->integer('sipp')->nullable()->change();
            $table->integer('str')->nullable()->change();
        });
    }
};