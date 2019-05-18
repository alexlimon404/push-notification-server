<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token')->unique();
            $table->string('ip')->nullable();
            $table->string('comment')->nullable();
            $table->enum('device_types', ['desktop', 'mobile', 'tablet'])->nullable();
            $table->enum('connection_types', ['Wifi', 'Cellular'])->nullable();
            $table->integer('server_key_id')->nullable()->unsigned();
            $table->foreign('server_key_id')
                ->references('id')
                ->on('server_keys')
                ->onDelete('cascade');
            $table->integer('browsers_id')->nullable()->unsigned();
            $table->foreign('browsers_id')
                ->references('id')
                ->on('browsers')
                ->onDelete('cascade');
            $table->integer('browser_versions_id')->nullable()->unsigned();
            $table->foreign('browser_versions_id')
                ->references('id')
                ->on('browser_versions')
                ->onDelete('cascade');
            $table->integer('cities_id')->nullable()->unsigned();
            $table->foreign('cities_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
            $table->integer('countries_id')->nullable()->unsigned();
            $table->foreign('countries_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');
            $table->integer('device_models_id')->nullable()->unsigned();
            $table->foreign('device_models_id')
                ->references('id')
                ->on('device_models')
                ->onDelete('cascade');
            $table->integer('languages_id')->nullable()->unsigned();
            $table->foreign('languages_id')
                ->references('id')
                ->on('languages')
                ->onDelete('cascade');
            $table->integer('operators_id')->nullable()->unsigned();
            $table->foreign('operators_id')
                ->references('id')
                ->on('operators')
                ->onDelete('cascade');
            $table->integer('os_id')->nullable()->unsigned();
            $table->foreign('os_id')
                ->references('id')
                ->on('os')
                ->onDelete('cascade');
            $table->integer('os_versions_id')->nullable()->unsigned();
            $table->foreign('os_versions_id')
                ->references('id')
                ->on('os_versions')
                ->onDelete('cascade');
            $table->integer('regions_id')->nullable()->unsigned();
            $table->foreign('regions_id')
                ->references('id')
                ->on('regions')
                ->onDelete('cascade');
            $table->integer('sources_id')->nullable()->unsigned();
            $table->foreign('sources_id')
                ->references('id')
                ->on('sources')
                ->onDelete('cascade');
            $table->integer('user_agents_id')->nullable()->unsigned();
            $table->foreign('user_agents_id')
                ->references('id')
                ->on('user_agents')
                ->onDelete('cascade');
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
        Schema::dropIfExists('subscribers');
    }
}
