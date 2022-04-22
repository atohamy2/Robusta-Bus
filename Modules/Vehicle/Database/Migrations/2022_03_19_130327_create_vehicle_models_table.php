<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Vehicle\Enums\VehicleModelType;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_models', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_model_name');
            $table->string('vehicle_model_type');
            $table->unsignedBigInteger('vehicle_brand_id')->nullable();
            $table->string('min_acceptance_year');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('vehicle_brand_id')->references('id')->on('vehicle_brands')->onDelete('set null');
        });
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_models');
    }
};
