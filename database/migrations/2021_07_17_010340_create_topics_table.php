<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->text('text');
            $table->boolean('is_open')->default(true);
            $table->timestamps();

            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id')
                  ->references('id')
                  ->on('sub_categories')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->dropForeign(['sub_category_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('topics');
    }
}
