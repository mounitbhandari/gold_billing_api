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
            $table->foreignId("company_id")->references("id")->on("companies")->onDelete('cascade');
            $table->string("product_name")->nullable(false);
            $table->string("description")->nullable(true);
            $table->tinyInteger('in_force')->default(1);
            $table->timestamps();
            $table->unique(["company_id","product_name"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
