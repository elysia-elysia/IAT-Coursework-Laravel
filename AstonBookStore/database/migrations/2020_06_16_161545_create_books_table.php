<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('ISBN_no', 13)->unique();
            $table->timestamps();
            $table->string('title');
            $table->decimal('price', 6, 2)->default(9.99);
            $table->string('category');
            $table->string('authorfirstname');
            $table->string('authorlastname');
            $table->integer('publishyear');
            $table->integer('stock');
            $table->string('description', 256)->nullable();
            $table->string('image', 256)->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
