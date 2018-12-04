<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sets', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('active');
            $table->tinyInteger('promo');
            $table->smallInteger('setorder');
            $table->dateTime('released');
            $table->char('title');
            $table->mediumInteger('setlength');
            $table->smallInteger('bpm');
            $table->char('filename');
            $table->char('filetype');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     *
     */
    public function down()
    {
        Schema::drop('sets');
    }
}
