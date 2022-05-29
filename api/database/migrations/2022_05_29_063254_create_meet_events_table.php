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
            $table->foreignId('meet_id')->constrained('meets')->cascadeOnDelete();
            $table->foreignId('meet_session_id')->nullable()->constrained('meet_sessions'); // the session can be set after you add all the events
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
            $table->char('classification', 24); // Classification Enum
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
