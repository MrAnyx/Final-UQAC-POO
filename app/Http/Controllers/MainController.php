<?php

namespace App\Http\Controllers;

use App\aop\Annotation\Logging;
use App\Models\Article;
use App\Models\Department;
use Gloudemans\Shoppingcart\Facades\Cart;

class MainController extends Controller {

   /**
    * @Logging
    */
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

      $items = $department->articles()->get();

      $inCart = [];

      foreach ($items as $item) {
         $inCart[$item->id] = false;
      }

      foreach (Cart::content() as $item) {
         $inCart[$item->id] = true;
      }
      return view("department", [
         "department" => $department,
         "items" => $items,
         "inCart" => $inCart,
      ]);
   }

   public function cart() {
      return view('cart', [
         "subtotal" => Cart::subtotal(),
         "taxes" => Cart::tax(),
         "total" => Cart::total(),
         "items" => Cart::content(),
         "count" => Cart::count(),
      ]);
   }

   public function payment() {
      return view('payment');
   }

   public function validation() {
      return view('validation');
   }
}
