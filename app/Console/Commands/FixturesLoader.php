<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FixturesLoader extends Command
{
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
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $files = File::files(storage_path("app".DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."items"));
        foreach($files as $image) {
            echo $image->getFilename().PHP_EOL;
        }
    }
}
