<?php

use App\Models\Event;
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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('constant')->unique();
            $table->string('sport');
            $table->string('gender');
            $table->string('mark_type');
            $table->boolean('is_relay')->default(0);
            $table->boolean('is_field')->default(0);
            $table->boolean('is_track')->default(0);
            $table->boolean('is_hurdles')->default(0);
            $table->boolean('is_distance')->default(0);
            $table->boolean('is_sprint')->default(0);
            $table->boolean('is_jump')->default(0);
            $table->boolean('is_throw')->default(0);
            $table->boolean('is_multi')->default(0);
            $table->boolean('has_wind')->default(0);
            $table->integer('sort')->default(0)->index();
            $table->timestamps();
        });

        Event::create([
            'constant'   => 'girls-100-meter-hurdles',
            'sport'      => 'TRACK',
            'gender'     => 'FEMALE',
            'is_track'   => 1,
            'is_hurdles' => 1,
            'is_sprint'  => 1,
            'has_wind'   => 1,
            'mark_type'  => 'TIME',
            'sort'       => 1030,
        ]);

        Event::create([
            'constant'   => 'boys-110-meter-hurdles',
            'sport'      => 'TRACK',
            'gender'     => 'MALE',
            'is_track'   => 1,
            'is_hurdles' => 1,
            'is_sprint'  => 1,
            'has_wind'   => 1,
            'mark_type'  => 'TIME',
            'sort'       => 1040,
        ]);

        Event::create([
            'constant'  => 'girls-100-meter',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'is_track'  => 1,
            'is_sprint' => 1,
            'has_wind'  => 1,
            'mark_type' => 'TIME',
            'sort'      => 1010,
        ]);

        Event::create([
            'constant'  => 'boys-100-meter',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'is_track'  => 1,
            'is_sprint' => 1,
            'has_wind'  => 1,
            'mark_type' => 'TIME',
            'sort'      => 1020,
        ]);
        Event::create([
            'constant'    => 'girls-1600-meter',
            'sport'       => 'TRACK',
            'gender'      => 'FEMALE',
            'is_track'    => 1,
            'is_distance' => 1,
            'mark_type'   => 'TIME',
            'sort'        => 1130,
        ]);
        Event::create([
            'constant'    => 'boys-1600-meter',
            'sport'       => 'TRACK',
            'gender'      => 'MALE',
            'is_track'    => 1,
            'is_distance' => 1,
            'mark_type'   => 'TIME',
            'sort'        => 1140,
        ]);
        Event::create([
            'constant'  => 'girls-400-meter',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'is_track'  => 1,
            'is_sprint' => 1,
            'mark_type' => 'TIME',
            'sort'      => 1090,
        ]);
        Event::create([
            'constant'  => 'boys-400-meter',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'is_track'  => 1,
            'is_sprint' => 1,
            'mark_type' => 'TIME',
            'sort'      => 1100,
        ]);
        Event::create([
            'constant'    => 'girls-800-meter',
            'sport'       => 'TRACK',
            'gender'      => 'FEMALE',
            'is_track'    => 1,
            'is_distance' => 1,
            'mark_type'   => 'TIME',
            'sort'        => 1110,
        ]);
        Event::create([
            'constant'    => 'boys-800-meter',
            'sport'       => 'TRACK',
            'gender'      => 'MALE',
            'is_track'    => 1,
            'is_distance' => 1,
            'mark_type'   => 'TIME',
            'sort'        => 1120,
        ]);
        Event::create([
            'constant'   => 'girls-300-meter-hurdles',
            'sport'      => 'TRACK',
            'gender'     => 'FEMALE',
            'is_track'   => 1,
            'is_hurdles' => 1,
            'is_sprint'  => 1,
            'mark_type'  => 'TIME',
            'sort'       => 1070,
        ]);
        Event::create([
            'constant'   => 'boys-300-meter-hurdles',
            'sport'      => 'TRACK',
            'gender'     => 'MALE',
            'is_track'   => 1,
            'is_hurdles' => 1,
            'is_sprint'  => 1,
            'mark_type'  => 'TIME',
            'sort'       => 1080,
        ]);
        Event::create([
            'constant'  => 'girls-200-meter',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'is_track'  => 1,
            'is_sprint' => 1,
            'mark_type' => 'TIME',
            'sort'      => 1050,
        ]);
        Event::create([
            'constant'  => 'boys-200-meter',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'is_track'  => 1,
            'is_sprint' => 1,
            'mark_type' => 'TIME',
            'sort'      => 1060,
        ]);
        Event::create([
            'constant'    => 'girls-3200-meter',
            'sport'       => 'TRACK',
            'gender'      => 'FEMALE',
            'is_track'    => 1,
            'is_distance' => 1,
            'mark_type'   => 'TIME',
            'sort'        => 1150,
        ]);
        Event::create([
            'constant'    => 'boys-3200-meter',
            'sport'       => 'TRACK',
            'gender'      => 'MALE',
            'is_track'    => 1,
            'is_distance' => 1,
            'mark_type'   => 'TIME',
            'sort'        => 1160,
        ]);
        Event::create([
            'constant'  => 'girls-discus',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'is_field'  => 1,
            'is_throw'  => 1,
            'mark_type' => 'DISTANCE',
            'sort'      => 2010,
        ]);
        Event::create([
            'constant'  => 'boys-discus',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'is_field'  => 1,
            'is_throw'  => 1,
            'mark_type' => 'DISTANCE',
            'sort'      => 2020,
        ]);
        Event::create([
            'constant'  => 'girls-shot-put',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'is_field'  => 1,
            'is_throw'  => 1,
            'mark_type' => 'DISTANCE',
            'sort'      => 2030,
        ]);
        Event::create([
            'constant'  => 'boys-shot-put',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'is_field'  => 1,
            'is_throw'  => 1,
            'mark_type' => 'DISTANCE',
            'sort'      => 2040,
        ]);
        Event::create([
            'constant'  => 'girls-javelin',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'is_field'  => 1,
            'is_throw'  => 1,
            'mark_type' => 'DISTANCE',
            'sort'      => 2050,
        ]);
        Event::create([
            'constant'  => 'boys-javelin',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'is_field'  => 1,
            'is_throw'  => 1,
            'mark_type' => 'DISTANCE',
            'sort'      => 2060,
        ]);
        Event::create([
            'constant'  => 'girls-high-jump',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'is_field'  => 1,
            'is_jump'   => 1,
            'mark_type' => 'DISTANCE',
            'sort'      => 2070,
        ]);
        Event::create([
            'constant'  => 'boys-high-jump',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'is_field'  => 1,
            'is_jump'   => 1,
            'mark_type' => 'DISTANCE',
            'sort'      => 2080,
        ]);
        Event::create([
            'constant'  => 'girls-long-jump',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'is_field'  => 1,
            'is_jump'   => 1,
            'has_wind'  => 1,
            'mark_type' => 'DISTANCE',
            'sort'      => 2090,
        ]);
        Event::create([
            'constant'  => 'boys-long-jump',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'is_field'  => 1,
            'is_jump'   => 1,
            'has_wind'  => 1,
            'mark_type' => 'DISTANCE',
            'sort'      => 2100,
        ]);
        Event::create([
            'constant'  => 'girls-pole-vault',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'is_field'  => 1,
            'is_jump'   => 1,
            'mark_type' => 'DISTANCE',
            'sort'      => 2110,
        ]);
        Event::create([
            'constant'  => 'boys-pole-vault',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'is_field'  => 1,
            'is_jump'   => 1,
            'mark_type' => 'DISTANCE',
            'sort'      => 2120,
        ]);
        Event::create([
            'constant'  => 'girls-4x100-relay',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'is_track'  => 1,
            'is_sprint' => 1,
            'is_relay'  => 1,
            'mark_type' => 'TIME',
            'sort'      => 3010,
        ]);
        Event::create([
            'constant'  => 'boys-4x100-relay',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'is_track'  => 1,
            'is_sprint' => 1,
            'is_relay'  => 1,
            'mark_type' => 'TIME',
            'sort'      => 3020,
        ]);
        Event::create([
            'constant'  => 'girls-4x200-relay',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'is_track'  => 1,
            'is_sprint' => 1,
            'is_relay'  => 1,
            'mark_type' => 'TIME',
            'sort'      => 3030,
        ]);
        Event::create([
            'constant'  => 'boys-4x200-relay',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'is_track'  => 1,
            'is_sprint' => 1,
            'is_relay'  => 1,
            'mark_type' => 'TIME',
            'sort'      => 3040,
        ]);
        Event::create([
            'constant'  => 'girls-4x400-relay',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'is_track'  => 1,
            'is_sprint' => 1,
            'is_relay'  => 1,
            'mark_type' => 'TIME',
            'sort'      => 3050,
        ]);
        Event::create([
            'constant'  => 'boys-4x400-relay',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'is_track'  => 1,
            'is_sprint' => 1,
            'is_relay'  => 1,
            'mark_type' => 'TIME',
            'sort'      => 3060,
        ]);
        Event::create([
            'constant'    => 'girls-4x800-relay',
            'sport'       => 'TRACK',
            'gender'      => 'FEMALE',
            'is_track'    => 1,
            'is_distance' => 1,
            'is_relay'    => 1,
            'mark_type'   => 'TIME',
            'sort'        => 3070,
        ]);
        Event::create([
            'constant'    => 'boys-4x800-relay',
            'sport'       => 'TRACK',
            'gender'      => 'MALE',
            'is_distance' => 1,
            'is_relay'    => 1,
            'mark_type'   => 'TIME',
            'sort'        => 3080,
        ]);
        Event::create([
            'constant'  => 'boys-decathlon',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'is_multi'  => 1,
            'mark_type' => 'SCORE',
            'sort'      => 4010,
        ]);
        Event::create([
            'constant'  => 'boys-heptathlon',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'is_multi'  => 1,
            'mark_type' => 'SCORE',
            'sort'      => 4020,
        ]);
        Event::create([
            'constant'  => 'girls-heptathlon',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'is_multi'  => 1,
            'mark_type' => 'SCORE',
            'sort'      => 4030,
        ]);
        Event::create([
            'constant'  => 'girls-pentathlon',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'is_multi'  => 1,
            'mark_type' => 'SCORE',
            'sort'      => 4040,
        ]);
        Event::create([
            'constant'  => 'girls-5k',
            'sport'     => 'TRACK',
            'gender'    => 'FEMALE',
            'mark_type' => 'TIME',
            'sort'      => 10010,
        ]);
        Event::create([
            'constant'  => 'boys-5k',
            'sport'     => 'TRACK',
            'gender'    => 'MALE',
            'mark_type' => 'TIME',
            'sort'      => 10020,
        ]);
        Event::create([
            'constant'  => 'girls-2k',
            'sport'     => 'XC',
            'gender'    => 'FEMALE',
            'mark_type' => 'TIME',
            'sort'      => 10030,
        ]);
        Event::create([
            'constant'  => 'boys-2k',
            'sport'     => 'XC',
            'gender'    => 'MALE',
            'mark_type' => 'TIME',
            'sort'      => 10040,
        ]);
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_events');
    }
};
