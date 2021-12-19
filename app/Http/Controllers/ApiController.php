<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ApiController extends Controller {
   public function updateCart(int $itemId) {

      // if (!Auth::check()) {
      //    return [
      //       "error" => true,
      //       "type" => "unauthorized",
      //    ];
      // }

      $data = Request::all();

      if ($data["type"] === "add") {
         $article = Article::find($itemId);
         $departments = [];
         foreach ($article->departments()->get() as $department) {
            $departments[] = [
               "name" => $department->name,
               "id" => $department->id,
            ];
         }
         Cart::add($article, 1, ['departments' => $departments, "image" => $article->image]);
      } else if ($data["type"] === "remove") {
         foreach (Cart::content() as $item) {
            if ($item->id === $itemId) {
               Cart::remove($item->rowId);
               break;
            }
         }
      }

      return [
         "error" => false,
         "type" => "success",
      ];

   }

   public function getCartQuantity() {
      if (!Auth::check()) {
         return 0;
      }

      return Cart::count();
   }

   public function destroyCart() {
      Cart::destroy();
   }

   public function validateCart() {
      $this->destroyCart();
   }

   public function emptyCart() {
      $this->destroyCart();
   }

}
