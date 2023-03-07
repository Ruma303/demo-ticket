<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTicketsTableAddUsersRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
//* Puoi concatenare altri metodi come after (pos. colonna dopo la colonna...) o un valore di default
            $table->unsignedBigInteger('user_id')->after('id')->default(1); //$ Creazione FK
            $table->foreign('user_id')->references('id')->on('users'); //$ Relazione FK
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
//* Elimina la relazione. Puoi usare o il nome combinato delle tabelle (tab1_tab2)
//* Oppure droppa direttamente la chiave esterna
            $table->dropForeign(['user_id']); //$ Eliminazione FK
            $table->dropColumn('user_id'); //$ Eliminazione Colonna FK
        });
    }
}
