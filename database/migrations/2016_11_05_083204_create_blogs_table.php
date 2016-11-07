<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        // the table name is blogs, contains 5 column.
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id'); // first, column is as primary
            $table->string('title'); // second, column title
            $table->string('description'); // third, column description
            $table->timestamps(); // finally, two column is created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
