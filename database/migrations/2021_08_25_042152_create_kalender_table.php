<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKalenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Kalender', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_periode")
                ->constrained("periode")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->string("foto");
            $table->text("deskripsi");
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
        Schema::dropIfExists('Kalender');
    }
}
