<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_quizzes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->default(null);
            $table->integer('quizze_id')->nullable()->default(null);
            $table->integer('total_answered')->nullable()->default(0);
            $table->integer('total_unanswered')->nullable()->default(0);
            $table->integer('correct_answered')->nullable()->default(0);
            $table->integer('time_taken')->nullable()->default(0);
            $table->enum('status', ['Complete', 'Incomplete'])->nullable()->default('Incomplete');
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
        Schema::dropIfExists('user_quizzes');
    }
}
