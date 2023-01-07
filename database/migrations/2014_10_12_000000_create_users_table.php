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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name', 255)->nullable(false);

            $table->string('last_name', 255)->nullable(false);

            $table->string('email')->unique()->nullable(false);

            $table->unsignedTinyInteger('is_user')
                ->nullable(false)
                ->default(0);

            $table->unsignedTinyInteger('is_admin')
                ->nullable(false)
                ->default(0);

            $table->timestamp('email_verified_at')->nullable();

            $table->string('password', 255)->nullable(false);

            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
};
