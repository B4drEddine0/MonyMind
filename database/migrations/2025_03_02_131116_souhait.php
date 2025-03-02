<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('souhaits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('titre');
            $table->decimal('montant_estime', 10, 2);
            $table->enum('categorie', ['Électronique', 'Véhicules', 'Immobilier', 'Voyage', 'Mode & Accessoires', 'Sport & Loisirs', 'Machines & Outils', 'Éducation', 'Divertissement', 'Santé & Bien-être', 'Autre']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('souhaits');
    }
};
