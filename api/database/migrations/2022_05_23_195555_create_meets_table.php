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
            $table->uuid('id')->primary();
            $table->tinyInteger('sport'); // Sport Enum
            $table->uuid('org_id'); // the org that owns the meet
            $table->string('name', 100)->fulltext(); // name of the meet
            $table->text('info')->nullable(); // details about the meet
            $table->boolean('is_sanctioned')->default(0); // has the meet been sanctioned by a governing body
            $table->timestamps();

            // foreign key
            $table->foreign('org_id')->references('id')->on('orgs');
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
