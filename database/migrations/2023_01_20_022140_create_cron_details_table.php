<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cron_details', function (Blueprint $table) {
            $table->id();

            $table->timestamp('executed_at')->useCurrent()->nullable();
            $table->float('memory_usage')->nullable();
            $table->integer('execution_time')->nullable();
            $table->enum('status', ['success', 'failure'])->default('success')->nullable();

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
        Schema::dropIfExists('cron_details');
    }
};
