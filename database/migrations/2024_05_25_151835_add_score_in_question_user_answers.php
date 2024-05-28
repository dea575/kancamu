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
        Schema::table('question_user_answers', function (Blueprint $table) {
            $table->string('answer')->nullable()->change();
            $table->integer('score')->nullable()->after('answer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('question_user_answers', function (Blueprint $table) {
            $table->integer('answer')->nullable()->change();
            $table->dropColumn('score');
        });
    }
};
