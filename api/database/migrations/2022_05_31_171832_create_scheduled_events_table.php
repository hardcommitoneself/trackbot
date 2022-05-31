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
        Schema::create('scheduled_events', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('meet_event_id')->constrained('meet_events')->cascadeOnDelete();
            $table->foreignId('meet_session_id')->constrained('meet_sessions')->cascadeOnDelete();
            $table->dateTime('start_at')->nullable(); // estimated time from meet officials
            $table->integer('sort')->default(0);
            $table->char('round', 24); // Round Enum
            $table->string('status')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheduled_events');
    }
};
