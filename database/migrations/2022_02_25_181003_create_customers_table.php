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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_id")->references("id")->on("companies");
            $table->string("customer_name")->nullable(true);
            $table->string("mobile1")->nullable(true);
            $table->string("address")->nullable(true);
            $table->decimal('opening_gold')->default(0);
            $table->integer('opening_lc')->default(0);
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
        Schema::dropIfExists('customers');
    }
};
