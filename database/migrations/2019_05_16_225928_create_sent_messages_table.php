<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sent_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_push_message')->nullable()->unsigned();
            $table->foreign('id_push_message')
                ->references('id')
                ->on('push_message')
                ->onDelete('cascade');
            $table->integer('id_subscribe')->nullable()->unsigned();
            $table->foreign('id_subscribe')
                ->references('id')
                ->on('subscribers')
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
        Schema::dropIfExists('sent_messages');
    }
}
