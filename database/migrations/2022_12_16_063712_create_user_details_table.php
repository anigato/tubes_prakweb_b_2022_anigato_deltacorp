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
            $table->integer("id_user");
            $table->string("nick_name");
            $table->string("full_name");
            $table->string("phone");
            $table->string("street");
            $table->string("rt");
            $table->string("rw");
            $table->string("dusun");
            $table->string("desa");
            $table->string("kecamatan");
            $table->string("kabupaten");
            $table->string("provinsi");
            $table->integer("postal_code");
            $table->string("img");
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
