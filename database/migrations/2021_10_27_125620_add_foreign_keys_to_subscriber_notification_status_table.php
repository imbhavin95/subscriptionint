<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSubscriberNotificationStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriber_notification_status', function (Blueprint $table) {
            $table->foreign(['blog_id'], 'subscriber_notification_status_ibfk_1')->references(['id'])->on('blogs')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriber_notification_status', function (Blueprint $table) {
            $table->dropForeign('subscriber_notification_status_ibfk_1');
        });
    }
}
