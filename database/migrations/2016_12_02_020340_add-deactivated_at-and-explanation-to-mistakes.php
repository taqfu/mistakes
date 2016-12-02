<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeactivatedAtAndExplanationToMistakes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mistakes', function (Blueprint $table) {
            $table->datetime('deactivated_at')->nullable();
            $table->text('deactivation_reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mistakes', function (Blueprint $table) {
            //
        });
    }
}
