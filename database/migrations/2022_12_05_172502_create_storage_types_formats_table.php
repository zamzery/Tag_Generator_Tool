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
        Schema::create('storage_types_formats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sata')->boolean();
            $table->string('m2')->boolean();
            $table->string('storage_types_format');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storage_types_formats');
    }
};
