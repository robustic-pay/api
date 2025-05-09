<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeStrategy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:strategy {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new strategy class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Strategy/{$name}.php");

        if (file_exists($path)) {
            $this->error("The {$name} strategy already exists!");

            return;
        }

        (new Filesystem)->ensureDirectoryExists(app_path('Strategy'));

        file_put_contents($path, $this->getStub($name));

        $this->info("Strategy {$name} created successfully!");
    }

    protected function getStub($name)
    {
        return <<<PHP
        <?php

        namespace App\Strategy;

        class {$name}Strategy
        {
            //
        }
        PHP;
    }
}
