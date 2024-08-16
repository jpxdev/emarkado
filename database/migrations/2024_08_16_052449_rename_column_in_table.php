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
        Schema::table('vendors', function (Blueprint $table) {
            $table->renameColumn('name', 'coop_representative_personel');
            $table->renameColumn('business_name', 'coop_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table', function (Blueprint $table) {
            $table->renameColumn('name', 'coop_representative_personel');
            $table->renameColumn('business_name', 'coop_name');
        });
    }
};
