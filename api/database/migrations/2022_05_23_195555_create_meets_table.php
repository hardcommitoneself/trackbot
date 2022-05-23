<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meets', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('sport'); // Sport Enum
            $table->foreignId('org_id')->constrained('orgs')->cascadeOnDelete(); // the org that owns the meet
            $table->string('name', 100)->fulltext(); // name of the meet
            $table->text('info')->nullable(); // details about the meet
            $table->boolean('is_sanctioned')->default(0); // has the meet been sanctioned by a governing body
            $table->uuid(); // Only expose UUIDs
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meets');
    }
};
