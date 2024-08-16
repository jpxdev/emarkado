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

        Schema::table('vendors', function(Blueprint $table){
            $table->renameColumn('coop_representative_personel', 'authorized_representative');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('vendors', function(Blueprint $table){
            $table->renameColumn('coop_representative_personel', 'authorized_representative');
        });
    }
};
