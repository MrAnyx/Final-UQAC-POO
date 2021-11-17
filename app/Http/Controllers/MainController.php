<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Department;

class MainController extends Controller {
   public function home() {
      $items = Article::get();
      return view("home", [
         "items" => $items,
      ]);
   }

   public function department(int $id) {
      $department = Department::find($id);
      return view("department", [
         "department" => $department,
      ]);
   }
}
