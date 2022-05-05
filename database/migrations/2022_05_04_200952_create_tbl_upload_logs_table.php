<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUploadLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_upload_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filename')->nullable();
            $table->string('status')->nullable();
            $table->string('path')->nullable();
            $table->string('processed')->nullable();
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
        Schema::dropIfExists('tbl_upload_logs');
    }
}
