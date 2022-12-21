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
        Schema::create('cpu_family_socket_series', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('amd')->boolean();
            $table->string('intel')->boolean();
            $table->string('cpu_family_socket_series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpu_family_socket_series');
    }
};
