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
        Schema::create('image_coords', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id', false, true)->nullable(false);
            $table->foreign('user_id', 'image_coords_user_id_foreign')->references('id')->on('users')->onDelete('cascade');

            $table->float('latitude', 255)->nullable()->default(null);

            $table->float('longitude', 255)->nullable()->default(null);

            $table->string('unfixed_image', 255)->nullable()->default(null);

            $table->float('x', 255)->nullable()->default(null);

            $table->float('y', 255)->nullable()->default(null);

            $table->float('w', 255)->nullable()->default(null);

            $table->float('z', 255)->nullable()->default(null);

            $table->integer('pollution_id', false, true)->nullable(false);
            $table->foreign('pollution_id')->references('id')->on('pollutions')->onDelete('cascade');

            $table->boolean('is_auto_uploaded')->default(0);

            $table->boolean('is_fixed')->default(0);

            $table->string('fixed_image')->nullable()->default(null);

            $table->integer('admin_id', false, true)->nullable(true)->default(null);
            $table->foreign('admin_id', 'image_coords_admin_id_foreign')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('image_coords');
    }
};
