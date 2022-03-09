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
        Schema::create('customer_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_id")->references("id")->on("companies")->onDelete('cascade');
            $table->string('category_name',20)->nullable(false)->unique();
            $table->double('gold_mv')->default(0);
            $table->integer('price_mv')->default(0);
            $table->tinyInteger('in_forced')->default(1);
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
        Schema::dropIfExists('customer_categories');
    }
};
