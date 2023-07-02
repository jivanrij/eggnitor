<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->dropColumn('order');
            $table->integer('sort_order')->default(0)->after('id');
        });

        DB::statement('UPDATE houses SET sort_order = id');
    }
};
