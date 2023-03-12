<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scores', function (Blueprint $table) {
            DB::transaction(function () use ($table) {
                $table->dropColumn([
                    'regulasi_emosi',
                    'pengendalian_impuls',
                    'optimis',
                    'percaya_diri',
                    'analisis_kausal',
                    'empati',
                    'reaching_out',
                    'final_score',
                ]);
                $table->unsignedBigInteger('aspect_id')->after('user_id')->nullable();
                $table->float('score')->after('user_id')->default(0);
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scores', function (Blueprint $table) {
            DB::transaction(function () use ($table) {
                $table->integer('regulasi_emosi')->default(0);
                $table->integer('pengendalian_impuls')->default(0);
                $table->integer('optimis')->default(0);
                $table->integer('percaya_diri')->default(0);
                $table->integer('analisis_kausal')->default(0);
                $table->integer('empati')->default(0);
                $table->integer('reaching_out')->default(0);
                $table->integer('final_score')->default(0);
                $table->dropColumn(['score', 'aspect_id']);
            });
        });
    }
}
