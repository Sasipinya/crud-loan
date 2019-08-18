<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('loanAmount', 21, 6)->nullable();
            $table->integer('loanTerm')->nullable();
            $table->decimal('interestRate',21,6)->nullable();
            $table->string('startdate_month', 100)->nullable();
            $table->string('startdate_year', 10)->nullable();
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
        Schema::drop('loan');
    }
}
