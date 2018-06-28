<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBehaviorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //系统记录表，记录了用户的行为记录
        Schema::create('log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('log_name')->nullable();  //可以对数据进行分类；
            $table->unsignedInteger('causer_id')->default(0)->nullable(); //0表示用户还没有登录 触发c的用户
            $table->string('access_url')->nullable();  //访问的url
            $table->string('source_url')->nullable();  //来源于哪个url
            $table->string('describe')->nullable(); //描述
            $table->ipAddress('ip')->nullable();
            $table->text('data')->nullable(); //其它数据
            $table->softDeletes();
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
        Schema::dropIfExists('log');
    }
}
