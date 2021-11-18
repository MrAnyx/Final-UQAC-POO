<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Department;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FixturesLoader extends Command {
   /**
    * The name and signature of the console command.
    *
    * @var string
    */
   protected $signature = 'fixtures:load';

   /**
    * The console command description.
    *
    * @var string
    */
   protected $description = 'Fixtures loader';

   /**
    * Create a new command instance.
    *
    * @return void
    */
   public function __construct() {
      parent::__construct();
   }

   /**
    * Execute the console command.
    *
    * @return int
    */
   public function handle() {

      $departments = [
         "allen-wrench.jpg" => [
            "departments" => ["Hardware store"],
            "price" => 8.99,
         ],
         "armoire.jpg" => [
            "departments" => ["House"],
            "price" => 86.99,
         ],
         "blanket.jpg" => [
            "departments" => ["House"],
            "price" => 2.50,
         ],
         "blue-jeans.jpg" => [
            "departments" => ["Clothes & accessories"],
            "price" => 35.45,
         ],
         "boat-trailer.jpg" => [
            "departments" => ["Vehicle"],
            "price" => 1230,
         ],
         "canvas.jpg" => [
            "departments" => ["Decoration"],
            "price" => 8.99,
         ],
         "charger.jpg" => [
            "departments" => ["Electronical"],
            "price" => 3.68,
         ],
         "deodorant.jpg" => [
            "departments" => ["Clothes & accessories"],
            "price" => 1.53,
         ],
         "desk.jpg" => [
            "departments" => ["House", "School"],
            "price" => 98.99,
         ],
         "dog.jpg" => [
            "departments" => ["House"],
            "price" => 5300,
         ],
         "drill.jpg" => [
            "departments" => ["Hardware store"],
            "price" => 64.50,
         ],
         "electrical-outlet.jpg" => [
            "departments" => ["House", "Hardware store", "Electronical"],
            "price" => 23.39,
         ],
         "eraser.jpg" => [
            "departments" => ["School"],
            "price" => 0.99,
         ],
         "glove.jpg" => [
            "departments" => ["Clothes & accessories"],
            "price" => 1.05,
         ],
         "golf-ball.jpg" => [
            "departments" => ["Other"],
            "price" => 10.53,
         ],
         "graph-paper.jpg" => [
            "departments" => ["Other"],
            "price" => 2.50,
         ],
         "headphones.jpg" => [
            "departments" => ["Electronical"],
            "price" => 23.99,
         ],
         "ice-cube-tray.jpg" => [
            "departments" => ["House"],
            "price" => 4.99,
         ],
         "ipod.jpg" => [
            "departments" => ["Electronical"],
            "price" => 153.99,
         ],
         "keyboard.jpg" => [
            "departments" => ["Electronical"],
            "price" => 23.65,
         ],
         "knife.jpg" => [
            "departments" => ["House"],
            "price" => 2.49,
         ],
         "lamp-shade.jpg" => [
            "departments" => ["House"],
            "price" => 6.60,
         ],
         "leaf-blower.jpg" => [
            "departments" => ["House", "Hardware store"],
            "price" => 255.99,
         ],
         "leaf.jpg" => [
            "departments" => ["Other"],
            "price" => 0.08,
         ],
         "mouse-pad.jpg" => [
            "departments" => ["Electronical"],
            "price" => 1.56,
         ],
         "multimeter.jpg" => [
            "departments" => ["Hardware store", "Electronical"],
            "price" => 30.60,
         ],
         "needle.jpg" => [
            "departments" => ["Other"],
            "price" => 1.60,
         ],
         "newspaper.jpg" => [
            "departments" => ["Other"],
            "price" => 5.00,
         ],
         "night-stand.jpg" => [
            "departments" => ["House"],
            "price" => 23.99,
         ],
         "onion.jpg" => [
            "departments" => ["Other"],
            "price" => 2.50,
         ],
         "painting-artwork.jpg" => [
            "departments" => ["House"],
            "price" => 2630,
         ],
         "pickup-truck.jpg" => [
            "departments" => ["Vehicle"],
            "price" => 26000,
         ],
         "playing-cards.jpg" => [
            "departments" => ["Other"],
            "price" => 3.40,
         ],
         "purse.jpg" => [
            "departments" => ["Clothes & accessories"],
            "price" => 30.48,
         ],
         "random-object-glue-bottle.jpg" => [
            "departments" => ["Other"],
            "price" => 1.60,
         ],
         "ruler.jpg" => [
            "departments" => ["School"],
            "price" => 0.99,
         ],
         "rusty-nail.jpg" => [
            "departments" => ["Hardware store"],
            "price" => 0.50,
         ],
         "sailboat.jpg" => [
            "departments" => ["Vehicle"],
            "price" => 23600,
         ],
         "sharpie.jpg" => [
            "departments" => ["Hardware store", "School"],
            "price" => 2.30,
         ],
         "siamese-cat.jpg" => [
            "departments" => ["Animal"],
            "price" => 3000,
         ],
         "spring.jpg" => [
            "departments" => ["Hardware store"],
            "price" => 0.60,
         ],
         "toothpick.jpg" => [
            "departments" => ["House"],
            "price" => 3.10,
         ],
         "tree.jpg" => [
            "departments" => ["Garden"],
            "price" => 24.50,
         ],
         "vcr.jpg" => [
            "departments" => ["House", "Electronical"],
            "price" => 15.20,
         ],
         "vhs-tape.jpg" => [
            "departments" => ["House", "Electronical"],
            "price" => 5.30,
         ],
         "video-game-object.jpg" => [
            "departments" => ["House", "Electronical"],
            "price" => 29.99,
         ],
      ];

      $files = File::files(storage_path("app" . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "items"));
      foreach ($files as $image) {
         $article = new Article();
         $imageName = $image->getFilename();
         $articleName = ucwords(str_replace("-", " ", str_replace(".jpg", "", $imageName)));

         $article_db = Article::create([
            "name" => $articleName,
            "image" => "items/" . $image->getFilename(),
            "price" => $departments[$imageName]["price"],
         ]);

         foreach ($departments[$imageName]["departments"] as $department) {
            if (DB::table('departments')->where('name', $department)->doesntExist()) {
               $department_db = Department::create([
                  "name" => $department,
               ]);
            } else {
               $department_db = Department::firstWhere('name', $department);
            }

            $article_db->departments()->attach($department_db->id);
         }
         $article_db->save();
      }
   }
}
