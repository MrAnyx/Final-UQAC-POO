<?php

namespace App\Http\Controllers;

use App\Models\Department;

class MainController extends Controller {
   public function home() {
      return view("home");
   }

   public function department(int $id) {
      $department = Department::find($id);
      return view("department", [
         "department" => $department,
      ]);
   }
}
