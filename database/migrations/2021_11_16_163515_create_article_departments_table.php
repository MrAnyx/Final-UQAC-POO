<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleDepartmentsTable extends Migration {
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up() {
      Schema::create('article_departments', function (Blueprint $table) {
         $table->bigInteger("article_id")->unsigned();
         $table->bigInteger("department_id")->unsigned();
         $table->foreign("article_id")->references("id")->on("articles")->onDelete('cascade');
         $table->foreign("department_id")->references("id")->on("departments")->onDelete('cascade');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down() {
      Schema::dropIfExists('article_departments');
   }
}
