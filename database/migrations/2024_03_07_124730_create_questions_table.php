<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('question_text')->nullable()->default(null);
            $table->string('option_a')->nullable()->default(null);
            $table->string('option_b')->nullable()->default(null);
            $table->string('option_c')->nullable()->default(null);
            $table->string('option_d')->nullable()->default(null);
            $table->string('correct_answer')->nullable()->default(null);
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
        Schema::dropIfExists('questions');
    }
}
