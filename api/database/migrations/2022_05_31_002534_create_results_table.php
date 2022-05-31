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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('athlete_id')->constrained('athletes')->cascadeOnDelete();
            $table->foreignId('organization_id')->nullable()->constrained('organizations')->cascadeOnDelete();
            $table->foreignId('meet_id')->nullable()->constrained('meets')->cascadeOnDelete();
            $table->foreignId('event_id')->constrained('events');
            $table->foreignId('meet_event_id')->nullable()->constrained('meet_events');
            $table->foreignId('scheduled_event_id')->nullable()->constrained('scheduled_events');
            $table->foreignId('meet_event_entry_id')->nullable()->constrained('meet_event_entries');
            $table->char('sport', 12);
            $table->char('gender', 12);
            $table->char('timing_type', 4)->nullable(); // TimingType Enum
            $table->string('static_athlete_first_name')->nullable(); // age at time of result
            $table->string('static_athlete_last_name')->nullable(); // age at time of result
            $table->integer('static_athlete_grade')->nullable(); // grade at time of result
            $table->integer('place')->nullable(); // as in 1st, 2nd..
            $table->decimal('points', 5)->nullable(); // awarded to the team... 10 -> 0.25
            $table->boolean('is_official')->default(0);
            $table->boolean('is_dns')->default(0);
            $table->boolean('is_dq')->default(0);
            $table->string('dq_note')->nullable();
            $table->date('at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
};
