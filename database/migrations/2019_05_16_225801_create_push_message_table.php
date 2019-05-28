<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePushMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('push_message', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('server_key_id')->nullable()->unsigned();
            $table->foreign('server_key_id')
                ->references('id')
                ->on('server_keys')
                ->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->string('icon')->nullable();
            $table->string('click_action')->nullable();
            $table->bigInteger('multicast_id')->nullable();
            $table->integer('success')->nullable();
            $table->integer('failure')->nullable();
            $table->integer('canonical_ids')->nullable();
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
        Schema::dropIfExists('sent_messages');
    }
}
