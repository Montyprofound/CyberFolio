<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;

class RemoveDuplicateProjects extends Command
{
    protected $signature = 'projects:remove-duplicates';
    protected $description = 'Remove duplicate projects from the database';

    public function handle()
    {
        $duplicates = Project::select('title')
            ->groupBy('title')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('title');

        if ($duplicates->isEmpty()) {
            $this->info('No duplicate projects found.');
            return;
        }

        $removedCount = 0;
        
        foreach ($duplicates as $title) {
            $projects = Project::where('title', $title)->orderBy('id')->get();
            
            // Keep the first one, remove the rest
            $projects->skip(1)->each(function ($project) use (&$removedCount) {
                $this->line("Removing duplicate: {$project->title} (ID: {$project->id})");
                $project->delete();
                $removedCount++;
            });
        }

        $this->info("Removed {$removedCount} duplicate projects.");
    }
}