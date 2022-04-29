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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('detail');
            $table->string('location');
            $table->string('price');
            $table->string('areaunit');
            $table->string('total_area');
            $table->string('city');
            $table->string('bedroom')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('plot_type')->nullable();
            $table->string('type')->nullable();
            $table->string('furnished')->nullable();
            $table->string('floor_level')->nullable();
            $table->string('ads_type');
            $table->string('rent_per')->nullable();
            
            $table->bigInteger('reads_count')->unsigned()->default(0)->index();

            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('company_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('agent_id')->nullable()->unsigned();
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade')->onUpdate('cascade');
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
        //
    }
};
