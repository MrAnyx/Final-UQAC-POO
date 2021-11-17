<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Department;
use Gloudemans\Shoppingcart\Facades\Cart;

class MainController extends Controller {
   public function home() {
      $items = Article::get();

      $inCart = [];

      foreach ($items as $item) {
         $inCart[$item->id] = false;
      }

      foreach (Cart::content() as $item) {
         $inCart[$item->id] = true;
      }

      return view("home", [
         "items" => $items,
         "inCart" => $inCart,
      ]);
   }

   public function department(int $id) {
      $department = Department::find($id);
      return view("department", [
         "department" => $department,
      ]);
   }
}
