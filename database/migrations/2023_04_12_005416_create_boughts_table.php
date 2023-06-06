<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('boughts', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->integer('quantity');
            $table->decimal('unit_price', 8, 2);
            $table->decimal('total_cost', 8, 2);
            $table->unsignedBigInteger('project_id');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boughts');
    }

};
