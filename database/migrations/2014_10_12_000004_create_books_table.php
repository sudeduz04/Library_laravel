<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("author_id");
            $table->unsignedBigInteger("pub_id");
            $table->string("name");
            $table->integer("pageNumber");
            $table->boolean("is_lended")->comment("0-kütüphanede, 1-kullanıcıda");
            $table->string("barkod_no")->nullable();
            $table->integer("avaliable_lend_time");
            $table->timestamps();
            $table->softdeletes();

            $table->foreign("user_id")->on("users")->references("id");
            $table->foreign("category_id")->on("categories")->references("id");
            $table->foreign("author_id")->on("authors")->references("id");
            $table->foreign("pub_id")->on("publicators")->references("id");


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
