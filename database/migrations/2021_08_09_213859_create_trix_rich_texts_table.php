<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrixRichTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trix_rich_texts', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('field');
            $table->uuidMorphs('model');
            $table->text('content')->nullable();
            $table->timestamps();
        });

        Schema::create('trix_attachments', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('field');
            $table->uuid('attachable_id')->nullable();
            $table->string('attachable_type');
            $table->string('attachment');
            $table->string('disk');
            $table->boolean('is_pending')->default(1);
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
        Schema::drop('trix_attachments');
        Schema::drop('trix_rich_texts');
    }
}
