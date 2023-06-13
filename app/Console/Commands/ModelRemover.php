<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ModelRemover extends Command
{
    protected $signature = 'model:remove {modelName}';

    protected $description = 'Remove a model and its related files';

    public function handle()
    {
        $modelName = $this->argument('modelName');
        $modelFile = app_path('Models/' . $modelName . '.php');
        $migrationFile = database_path('migrations/*_create_' . Str::snake($modelName) . '_table.php');

        if (File::exists($modelFile)) {
            File::delete($modelFile);
            $this->info("Model $modelName deleted successfully.");
        } else {
            $this->warn("Model $modelName does not exist.");
        }

        $migrationFiles = glob($migrationFile);
        if (!empty($migrationFiles)) {
            foreach ($migrationFiles as $file) {
                File::delete($file);
            }
            $this->info("Migration files for model $modelName deleted successfully.");
        } else {
            $this->warn("Migration files for model $modelName do not exist.");
        }
    }
}
