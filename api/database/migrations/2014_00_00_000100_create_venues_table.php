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
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable(); // text area for describing the facility
            $table->string('surface')->nullable(); // free-form text (rubberized, mondo, etc)
            $table->tinyInteger('lanes')->nullable(); // number of lanes for track venues
            $table->integer('capacity')->nullable(); // number of people that can watch the event
            $table->text('parking_information')->nullable(); // text area for describing where to park.
            $table->string('profile_photo_path')->nullable(); // image showing the venue - will upload to s3. Look at user profile_photo_path.  Can add the same trait to handle it.
            // 1 to 1 to addresses - already in place and seeded.  Need add ability to manage them.
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
