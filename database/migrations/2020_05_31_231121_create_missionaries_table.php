<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missionaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(false);
            $table->string('email_1')->nullable(false);
            $table->string('email_2')->nullable();
            $table->longText('phone_1')->nullable();// JSON: {"number":"99999999", "socials": {"wa":true, "telegram":true}}
            $table->longText('phone_2')->nullable();// JSON: {"number":"99999999", "socials": {"wa":true, "telegram":true}}
            $table->longText('note')->nullable(); // Nota do missionário
            $table->string('allocated_in')->nullable(); // Endreço extenso, ex: "Portão Curitiba Paraná Brasil"

            $table->string('allocated_country')->nullable(); //País
            $table->string('allocated_state')->nullable(); //Estado ex: BR-UF
            $table->string('allocated_city')->nullable(); //Cidade
            $table->string('allocated_district')->nullable(); //Bairro

            $table->decimal('allocated_lat', 10, 7)->nullable();
            $table->decimal('allocated_long', 10, 7)->nullable();
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
        Schema::dropIfExists('missionaries');
    }
}
