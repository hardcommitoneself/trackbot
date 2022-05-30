<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->string('name');
            $table->char('surface_material', 12)->nullable(); // SurfaceMaterial Enum
            $table->text('description')->nullable(); // text area for describing the facility
            $table->tinyInteger('lanes')->nullable(); // number of lanes for track venues
            $table->integer('capacity')->nullable(); // number of people that can watch the event
            $table->text('parking_information')->nullable(); // text area for describing where to park.
            $table->string('profile_photo_path')->nullable(); // image showing the venue - will upload to s3. Look at user profile_photo_path.  Can add the same trait to handle it.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venues');
    }
};
