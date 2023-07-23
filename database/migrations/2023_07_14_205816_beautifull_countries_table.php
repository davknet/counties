<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BeautifullCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->char('iso' , 2 )->unique();
        $table->string('img_url')->nullable();
        $table->unsignedBigInteger('user_id');
        $table->timestamp("created_at")->nullable();
        $table->timestamp("updated_at")->nullable();
        $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
