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
            "type" => "auth",
         ];
      }

      $userId = Auth::user()->id;
      $data = Request::all();
      $article = Article::find($itemId);

      if ($data["type"] === "add") {
         Cart::add($article, 1);
      } else if ($data["type"] === "remove") {
         Cart::remove($article->id);
      }

      return [
         "erorr" => false,
         "type" => "success",
         "options" => [
            "cartQuantity" => Cart::count(),
         ],
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
