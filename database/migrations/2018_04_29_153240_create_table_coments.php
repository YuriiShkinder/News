<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('coments');
        Schema::create('coments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('new_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('text');
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);

            $table->foreign('new_id')->references('id')->on('news')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

            Schema::drop('coments',function ($table){
                $table->dropForeign('coments_new_id_foreign');
                $table->dropForeign('coments_user_id_foreign');
            });

    }
}
