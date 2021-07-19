<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_disposisi')->constrained('disposisi')->onDelete('cascade')->onUpdate("cascade");
            $table->foreignId('id_dari')->constrained('guru')->onDelete('cascade')->onUpdate("cascade");
            $table->foreignId('id_untuk')->constrained('guru')->onDelete('cascade')->onUpdate("cascade");
            $table->text('description_feedback');
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
        Schema::dropIfExists('feedback');
    }
}
