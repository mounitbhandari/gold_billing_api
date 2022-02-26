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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("company_name",20)->nullable(false);
            $table->string("mailing_name",20)->nullable(true);
            $table->string("address",255)->nullable(true);
            $table->string("phone1",12)->nullable(true);
            $table->string("phone2",12)->nullable(true);
            $table->string("email",255)->nullable(true);
            $table->date('doj')->nullable(true);
            $table->date('valid_upto')->nullable(true);
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
        Schema::dropIfExists('companies');
    }
};
