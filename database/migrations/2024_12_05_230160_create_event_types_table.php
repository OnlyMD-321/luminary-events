<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTypeTable extends Migration
{
    public function up()
    {
        Schema::create('eventtype', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 50);
            $table->text('Description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventtype');
    }
}
