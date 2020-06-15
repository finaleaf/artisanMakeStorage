<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;


class Storage extends Command
{

	protected $signature = "make:storage";

	public function handle()
	{

		$structure = [
			"storage",
			"storage/app",
			"storage/framework",
			"storage/framework/cache",
			"storage/framework/cache/data",
			"storage/framework/sessions",
			"storage/framework/views",
			"storage/logs",
		];

		$this->info("Start generating storage directories...");

		foreach ($structure as $dir) {
			if (!is_dir($dir)) {
				mkdir($dir, 0777);
				$this->line($dir . " Created");
			}
		}

		exec("chmod 777 storage -R");

		$this->info("Finished.");

	}
}
