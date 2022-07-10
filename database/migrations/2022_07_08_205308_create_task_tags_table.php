<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('tag_id');

            $table->timestamps();

            //IDX
            $table->index('task_id', 'task_tag_task_idx');
            $table->index('tag_id', 'task_tag_tag_idx');

            //FK
            $table->foreign('task_id', 'task_tag_task_fk')->on('tasks')->references('id');
            $table->foreign('tag_id', 'task_tag_tag_fk')->on('tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_tags');
    }
}
