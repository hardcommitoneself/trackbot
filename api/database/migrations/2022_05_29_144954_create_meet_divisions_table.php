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
        Schema::create('meet_divisions', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('meet_id')->constrained('meets')->cascadeOnDelete();
            $table->string('name');
            $table->char('abbr', 5);
            $table->char('level', 24); // Level Enum
            $table->integer('identifier'); // needed for meet management to identify the entries
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meet_divisions');
    }
};
