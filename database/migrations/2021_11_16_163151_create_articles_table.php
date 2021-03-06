<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration {
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up() {
      Schema::create('articles', function (Blueprint $table) {
         $table->id();
         $table->string("name");
         $table->string("image");
         $table->float("price", 8, 2);
         $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down() {
      Schema::dropIfExists('articles');
   }
}
