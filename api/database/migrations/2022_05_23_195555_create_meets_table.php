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
        Schema::create('meets', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->char('sport', 20); // Sport Enum
            $table->foreignId('organization_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('director_user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('venue_id')->nullable()->constrained('venues');
            $table->string('name', 100)->fulltext(); // name of the meet
            $table->text('information')->nullable(); // details about the meet
            $table->boolean('is_indoor')->default(0); // is the meet being held indoors
            $table->boolean('is_sanctioned')->default(0); // has the meet been sanctioned by a governing body
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meets');
    }
};
