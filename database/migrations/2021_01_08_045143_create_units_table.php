<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("Unit")->unique();
            $table->string("language1");
            $table->string("language2");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->ondelete("cascade");
            $table->foreign("language1")->references("languages_name")->on("languages")->ondelete("cascade");
            $table->foreign("language2")->references("languages_name")->on("languages")->ondelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
