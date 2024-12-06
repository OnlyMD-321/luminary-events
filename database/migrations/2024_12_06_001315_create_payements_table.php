<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementTable extends Migration
{
    public function up()
    {
        Schema::create('paiement', function (Blueprint $table) {
            $table->id();
            $table->enum('ModePaiement', ['Cash', 'PayPal', 'Carte']);
            $table->foreignId('IDEventReservation')->constrained('event_reservations');
            $table->foreignId('IDUser')->constrained('users');
            $table->decimal('PrixTTC', 10, 2);
            $table->enum('Status', ['Pending', 'Successful', 'Failed'])->default('Pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paiement');
    }
}
