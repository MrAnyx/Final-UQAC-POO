<?php

namespace App\Http\Controllers;

use App\Models\Article;
// use Darryldecode\Cart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ApiController extends Controller {
   public function updateCart(int $itemId) {

      if (!Auth::check()) {
         return [
            "error" => true,
            "type" => "unauthorized",
         ];
      }

      $data = Request::all();

      if ($data["type"] === "add") {
         $article = Article::find($itemId);
         Cart::add($article, 1);
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
      return Cart::destroy();
   }
}
