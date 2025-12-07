<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add role column if it doesn't exist
        if (! Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('user')->after('password');
            });
        }

        // Backfill existing users: set everyone to 'user' by default
        DB::table('users')->whereNull('role')->orWhere('role', '')->update(['role' => 'user']);

        // Ensure the admin user (by email or name) has admin role. Update the admin email if different.
        DB::table('users')->where('email', 'admin@example.com')->update(['role' => 'admin']);
        DB::table('users')->where('name', 'admin1')->update(['role' => 'admin']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('role');
            });
        }
    }
};

