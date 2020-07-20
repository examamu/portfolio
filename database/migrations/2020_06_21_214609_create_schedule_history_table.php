<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schedule_id');
            $table->integer('customer_id');
            $table->integer('user_id');
            $table->integer('facility_id');
            $table->integer('service_type_id');
            $table->date('date');
            $table->time('start_time');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('schedule_histories');
    }
}
