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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("nick_name")->nullable();
            $table->string("full_name")->nullable();
            $table->string("phone")->nullable();
            $table->string("street")->nullable();
            $table->string("rt")->nullable();
            $table->string("rw")->nullable();
            $table->string("dusun")->nullable();
            $table->string("desa")->nullable();
            $table->string("kecamatan")->nullable();
            $table->string("kabupaten")->nullable();
            $table->string("provinsi")->nullable();
            $table->integer("postal_code")->nullable();
            $table->string("img")->nullable();
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
        Schema::dropIfExists('user_details');
    }
};
