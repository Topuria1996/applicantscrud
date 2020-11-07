<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('surname', 500)->nullable();
            $table->string('position', 255)->nullable();
            $table->decimal('phone', 22)->nullable()->default(0.00);
            $table->timestamp('is_hired',12)->nullable()->default("true");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
