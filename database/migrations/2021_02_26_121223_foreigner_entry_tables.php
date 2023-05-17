<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignerEntryTables extends Migration
{
    public function up()
    {
        Schema::connection('esp')->create('foreigner_data_entry', function (Blueprint $q) {
            $q->increments('id');
            $q->primary('id');
            $q->string('submission_user');
            $q->date('submit_date');
        });

        Schema::connection('esp')->create('foreigner_data_entry_info', function (Blueprint  $q) {
            $q->increments('id');
            $q->primary('id');
            $q->integer('foreigner_data_entry_id');
            $q->index('foreigner_data_entry_id');
            $q->string('data_field');
            $q->string('data_field_answer');

            $q->foreign('foreigner_data_entry_id')->references('id')->on('foreigner_data_entry');
        });
    }

    public function down()
    {
        Schema::connection('esp')->drop('foreigner_data_entry_info');
        Schema::connection('esp')->drop('foreigner_data_entry');
    }
}
