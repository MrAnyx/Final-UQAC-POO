<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements Buyable {
   use HasFactory;
   const UPDATED_AT = null;

   protected $fillable = ["name", "image", "price"];

   public function departments() {
      return $this->belongsToMany(Department::class, ArticleDepartment::class);
   }

   public function getBuyableIdentifier($options = null) {
      return $this->id;
   }

   public function getBuyableDescription($options = null) {
      return $this->name;
   }

   public function getBuyablePrice($options = null) {
      return $this->price;
   }
}
