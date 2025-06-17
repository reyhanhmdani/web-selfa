<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestAssetUrl extends Command
{
    protected $signature = 'test:asset-url';
    protected $description = 'Test asset URL';

    public function handle()
    {
        $url = asset("storage/teacher-documents/SimC.pdf");
        $this->info("PDF URL: $url");
    }
}
