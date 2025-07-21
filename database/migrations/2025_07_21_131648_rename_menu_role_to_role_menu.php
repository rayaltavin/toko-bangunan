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
        Schema::rename('menu_role', 'role_menu');
    }

    public function down(): void
    {
        Schema::rename('role_menu', 'menu_role');
    }
};
