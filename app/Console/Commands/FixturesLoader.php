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
         "allen-wrench.jpg" => ["Hardware store"],
         "armoire.jpg" => ["House"],
         "blanket.jpg" => ["House"],
         "blue-jeans.jpg" => ["Clothes & accessories"],
         "boat-trailer.jpg" => ["Vehicle"],
         "canvas.jpg" => ["Decoration"],
         "charger.jpg" => ["Electronical"],
         "deodorant.jpg" => ["Clothes & accessories"],
         "desk.jpg" => ["House", "School"],
         "dog.jpg" => ["House"],
         "drill.jpg" => ["Hardware store"],
         "electrical-outlet.jpg" => ["House", "Hardware store", "Electronical"],
         "eraser.jpg" => ["School"],
         "glove.jpg" => ["Clothes & accessories"],
         "golf-ball.jpg" => ["Other"],
         "graph-paper.jpg" => ["Other"],
         "headphones.jpg" => ["Electronical"],
         "ice-cube-tray.jpg" => ["House"],
         "ipod.jpg" => ["Electronical"],
         "keyboard.jpg" => ["Electronical"],
         "knife.jpg" => ["House"],
         "lamp-shade.jpg" => ["House"],
         "leaf-blower.jpg" => ["House", "Hardware store"],
         "leaf.jpg" => ["Other"],
         "mouse-pad.jpg" => ["Electronical"],
         "multimeter.jpg" => ["Hardware store", "Electronical"],
         "needle.jpg" => ["Other"],
         "newspaper.jpg" => ["Other"],
         "night-stand.jpg" => ["House"],
         "onion.jpg" => ["Other"],
         "painting-artwork.jpg" => ["House"],
         "pickup-truck.jpg" => ["Vehicle"],
         "playing-cards.jpg" => ["Other"],
         "purse.jpg" => ["Clothes & accessories"],
         "random-object-glue-bottle.jpg" => ["Other"],
         "ruler.jpg" => ["School"],
         "rusty-nail.jpg" => ["Hardware store"],
         "sailboat.jpg" => ["Vehicle"],
         "sharpie.jpg" => ["Hardware store", "School"],
         "siamese-cat.jpg" => ["Animal"],
         "spring.jpg" => ["Hardware store"],
         "toothpick.jpg" => ["House"],
         "tree.jpg" => ["Garden"],
         "vcr.jpg" => ["House", "Electronical"],
         "vhs-tape.jpg" => ["House", "Electronical"],
         "video-game-object.jpg" => ["House", "Electronical"],
      ];

      $files = File::files(storage_path("app" . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "items"));
      foreach ($files as $image) {
         $article = new Article();
         $imageName = $image->getFilename();
         $articleName = ucwords(str_replace("-", " ", str_replace(".jpg", "", $imageName)));

         $article_db = Article::create([
            "name" => $articleName,
            "image" => "storage" . DIRECTORY_SEPARATOR . "items" . DIRECTORY_SEPARATOR . $image->getFilename(),
         ]);

         foreach ($departments[$imageName] as $department) {
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
