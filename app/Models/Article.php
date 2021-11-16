<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {
   use HasFactory;
   const UPDATED_AT = null;

   protected $fillable = ["name", "image"];

   public function departments() {
      return $this->belongsToMany(Department::class, ArticleDepartment::class);
   }
}
