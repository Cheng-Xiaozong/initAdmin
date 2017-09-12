<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('姓名');
            $table->string('email')->comment('邮箱');
            $table->string('store_name')->comment('商城名称');
            $table->char('china_id',18)->comment('身份证号码');
            $table->char('phone',11)->unique()->comment('手机号码');
            $table->smallInteger('province')->comment('经营所在省');
            $table->smallInteger('city')->comment('经营所在市');
            $table->smallInteger('county')->comment('经营所在县');
            $table->string('address')->comment('详细地址');
            $table->string('address_details')->comment('完整地址');
            $table->tinyInteger('status')->default(1)->comment('状态(0启用1禁用)');
            $table->tinyInteger('user_type')->comment('用户类型（1个人2公司）');
            $table->string('bank')->comment('收款开户银行');
            $table->string('bank_name')->comment('收款开户名称：张三');
            $table->string('bank_number')->comment('收款开户行帐号');
            $table->string('password')->comment('密码');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
