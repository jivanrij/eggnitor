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
        Schema::table('houses', function (Blueprint $table) {
            $table->string('status')->default('active')->after('sort_order');
        });

        \App\Models\House::query()->get()->each(function (\App\Models\House $house) {
            if ($house->active) {
                $house->status = \App\Models\House\Status::Active->slug();
            } else {
                $house->status = \App\Models\House\Status::InActive->slug();
            }
            $house->save();
        });
    }
};
