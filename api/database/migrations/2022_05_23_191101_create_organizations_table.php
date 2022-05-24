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
        Schema::create('organizations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('sport', 5); // Sport Enum
            $table->char('organization_type', 20); // OrgType Enum
            $table->string('name', 100); // full name of the organization
            $table->string('abbr', 5)->unique(); // will be the primary identifier
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
};
