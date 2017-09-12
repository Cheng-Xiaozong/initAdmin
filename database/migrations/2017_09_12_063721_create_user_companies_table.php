<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('经销商ID');
            $table->string('company_name')->comment('公司名称');
            $table->string('company_number')->comment('证照号码');
            $table->string('legal_name')->comment('法人姓名');
            $table->char('legal_phone',11)->comment('法人手机号');
            $table->char('legal_china_id',18)->comment('法人身份证号');
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
        Schema::drop('user_companies');
    }
}
