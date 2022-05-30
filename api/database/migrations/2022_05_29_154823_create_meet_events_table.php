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
        Schema::create('meet_events', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
            $table->foreignId('meet_division_id')->constrained('meet_divisions')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meet_events');
    }
};
