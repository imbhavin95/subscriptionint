<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSubscriberWebsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriber_website', function (Blueprint $table) {
            $table->foreign(['website_id'], 'subscriber_website_ibfk_1')->references(['id'])->on('websites')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['subscriber_id'], 'subscriber_website_ibfk_2')->references(['id'])->on('subscribers')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriber_website', function (Blueprint $table) {
            $table->dropForeign('subscriber_website_ibfk_1');
            $table->dropForeign('subscriber_website_ibfk_2');
        });
    }
}
