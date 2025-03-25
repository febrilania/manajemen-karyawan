<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable(); // Tambah kolom baru
        });

        // Copy data dari `name` ke `username`
        DB::statement('UPDATE users SET username = name');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name'); // Hapus kolom name
            $table->string('username')->unique()->change(); // Jadikan username unik
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable();
        });

        // Copy data kembali dari `username` ke `name`
        DB::statement('UPDATE users SET name = username');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
};
