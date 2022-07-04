<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutgoingMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outgoing_mails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('uuid')->unique();
            $table->string('number');
            $table->string('code');
            $table->string('regarding');
            $table->date('date');
            $table->string('agency');
            $table->text('file');
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
        Schema::dropIfExists('outgoing_mails');
    }
}
