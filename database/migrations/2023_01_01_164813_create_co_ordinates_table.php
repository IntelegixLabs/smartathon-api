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
        Schema::create('co_ordinates', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id', false, true)->nullable(false);
            $table->foreign('user_id', 'co_ordinates_user_id_foreign')->references('id')->on('users');

            $table->float('x')->default(null);

            $table->float('y')->default(null);

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
        Schema::dropIfExists('co_ordinates');
    }
};
