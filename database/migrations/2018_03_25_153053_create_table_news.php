<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::dropIfExists('news');
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id',true);
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('title',255);
            $table->text('text');
            $table->text('full_text');
            $table->string('images',255);
            $table->integer('counts')->nullable();
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('category_id')->references('id')->on('categorys')->onDelete('cascade');

            $table->engine = "InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news',function ($table){
        $table->dropForeign('news_category_id_foreign');
            $table->dropForeign('news_section_id_foreign');
        });
    }
}
