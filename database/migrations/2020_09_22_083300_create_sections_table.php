<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable();
            $table->string('eName')->nullable();
            $table->longText('description')->nullable();
            $table->longText('eDescription')->nullable();
            $table->string('url')->nullable();
            $table->bigInteger('order');
            $table->bigInteger('page');
            $table->unsignedBigInteger('type');
            $table->foreign('type')->references('id')->on('types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
