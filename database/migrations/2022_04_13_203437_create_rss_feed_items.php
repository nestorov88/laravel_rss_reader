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
        Schema::create('rss_feed_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('feed_id');
            $table->string('title')->nullable(false);
            $table->string('url')->nullable(false);
            $table->longText('description')->nullable(true)->default(null);

            $table->foreign('feed_id')->references('id')->on('rss_feeds');

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
        Schema::dropIfExists('rss_feed_items');
    }
};
