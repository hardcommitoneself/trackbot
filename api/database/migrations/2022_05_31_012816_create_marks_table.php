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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->morphs('markable');
            $table->char('mark_type', 12);
            $table->time('time', 2)->nullable(); // races
            $table->decimal('distance', 8, 2)->nullable(); // field
            $table->integer('score')->nullable(); // multi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
};
