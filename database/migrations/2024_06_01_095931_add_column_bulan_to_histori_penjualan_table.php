<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('histori_penjualan', function (Blueprint $table) {
            $table->integer('bulan')->after('total');
        });
    }


    public function down(): void
    {
        Schema::table('histori_penjualan', function (Blueprint $table) {
            $table->dropColumn('bulan');
        });
    }
};