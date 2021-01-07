<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('APP_USER_MENU', function (Blueprint $table) {
            $table->increments('id')->id()->nullable(false);
            $table->timestamp('created_at')->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->bigInteger('created_by')->nullable(false);
            $table->timestamp('updated_at')->nullable()->default(DB::raw('NULL on update CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->unsignedInteger('user_id')->nullable(false);
            $table->string('menu')->nullable(false);
            $table->foreign('user_id')->references('id')->on('APP_USER')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('APP_USER_MENU');
    }
}
