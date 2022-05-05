<?php

namespace FCPS\Tall\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class TallCommand extends Command
{
    public $signature = 'tall:install';

    public $description = 'Copy assets.';

    public function handle(): int
    {
        shell_exec('npm install alpinejs; npm install -D tailwindcss postcss autoprefixer @tailwindcss/forms @tailwindcss/typography @tailwindcss/line-clamp; npm run dev;');

        $filesys = new Filesystem();
        $filesys->copyDirectory(__DIR__ . '/../../stubs', base_path());

        return self::SUCCESS;
    }
}
