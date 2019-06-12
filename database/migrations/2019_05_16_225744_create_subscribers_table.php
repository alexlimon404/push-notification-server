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
            $table->enum('device_type', ['desktop', 'mobile', 'tablet'])->nullable();
            $table->enum('connection_type', ['Wifi', 'Cellular'])->nullable();
            $table->integer('server_key_id')->nullable()->unsigned();
            $table->foreign('server_key_id')
                ->references('id')
                ->on('server_keys')
                ->onDelete('cascade');
            $table->integer('browser_id')->nullable()->unsigned();
            $table->foreign('browser_id')
                ->references('id')
                ->on('browsers')
                ->onDelete('cascade');
            $table->integer('browser_version_id')->nullable()->unsigned();
            $table->foreign('browser_version_id')
                ->references('id')
                ->on('browser_versions')
                ->onDelete('cascade');
            $table->integer('city_id')->nullable()->unsigned();
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
            $table->integer('country_id')->nullable()->unsigned();
            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');
            $table->integer('device_model_id')->nullable()->unsigned();
            $table->foreign('device_model_id')
                ->references('id')
                ->on('device_models')
                ->onDelete('cascade');
            $table->integer('language_id')->nullable()->unsigned();
            $table->foreign('language_id')
                ->references('id')
                ->on('languages')
                ->onDelete('cascade');
            $table->integer('operator_id')->nullable()->unsigned();
            $table->foreign('operator_id')
                ->references('id')
                ->on('operators')
                ->onDelete('cascade');
            $table->integer('os_id')->nullable()->unsigned();
            $table->foreign('os_id')
                ->references('id')
                ->on('os')
                ->onDelete('cascade');
            $table->integer('os_version_id')->nullable()->unsigned();
            $table->foreign('os_version_id')
                ->references('id')
                ->on('os_versions')
                ->onDelete('cascade');
            $table->integer('region_id')->nullable()->unsigned();
            $table->foreign('region_id')
                ->references('id')
                ->on('regions')
                ->onDelete('cascade');
            $table->integer('source_id')->nullable()->unsigned();
            $table->foreign('source_id')
                ->references('id')
                ->on('sources')
                ->onDelete('cascade');
            $table->integer('user_agent_id')->nullable()->unsigned();
            $table->foreign('user_agent_id')
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
