<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->string('email', 128)->nullable()->after('author_name');
            $table->string('website', 255)->nullable()->after('email');
            $table->boolean('approved')->default(false)->after('website');
        });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn(['email', 'website', 'approved']);
        });
    }
};
