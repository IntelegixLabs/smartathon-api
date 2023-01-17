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
        Schema::create('pollutions', function (Blueprint $table) {
            $table->increments('id');

            $table->string('kind', 255)->nullable()->default(null);

            $table->string('type', 255)->nullable()->default(null);

            $table->string('image_name')->nullable()->default(null);

            $table->timestamp('created_at')->useCurrent();

            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pollutions');
    }
};
