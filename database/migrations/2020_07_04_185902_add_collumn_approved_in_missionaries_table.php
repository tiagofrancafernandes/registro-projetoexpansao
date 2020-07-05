<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollumnApprovedInMissionariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('missionaries', function (Blueprint $table) {
            $table->boolean('approved')->nullable(false)->default(false);
            $table->datetime('approved_at')->nullable(true)->default(null);
            $table->integer('approved_by')->nullable(true)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('missionaries', function (Blueprint $table) {
            $table->dropColumn(['approved']);
        });
    }
}
