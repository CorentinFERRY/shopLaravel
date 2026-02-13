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
        Schema::table('products', function (Blueprint $table) {
            
            //ajout d'un index sur la colonne "category_id"
            $table->index('category_id');
            //Ajout d'un index sur la colonne "active"
            $table->index('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //reverse the migration by dropping the indexes
            $table->dropIndex(['category_id']);
            $table->dropIndex(['active']);  
        });
    }
};
