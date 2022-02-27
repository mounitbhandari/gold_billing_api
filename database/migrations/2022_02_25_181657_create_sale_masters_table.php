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
        Schema::create('sale_masters', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_id")->references("id")->on("companies");
            $table->foreignId("customer_id")->references("id")->on("customers");
            $table->date("sale_date");
            $table->string("invoice_number",15);
            $table->decimal("discount");
            $table->decimal("round_off");
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
        Schema::dropIfExists('sale_masters');
    }
};
