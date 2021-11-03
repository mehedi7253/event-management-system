<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStakeholderpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stakeholderpayments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stakeholder_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->float('total_amount');
            $table->float('percent');
            $table->float('given_amount');
            $table->bigInteger('status');
            $table->foreign('stakeholder_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('stakeholderpayments');
    }
}
