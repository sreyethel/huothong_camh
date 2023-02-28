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
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->float('price', 8, 2);
            $table->string('size', 100)->nullable();
            $table->longText('content');
            $table->text('thumbnail');
            $table->longText('gallery')->nullable();
            $table->longText('feature')->nullable();
            $table->tinyInteger('status')->default(config('dummy.status.active.key'));
            $table->timestamps();
            $table->softDeletes();
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