<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Project;
use Carbon\Carbon;

class CompleteExpiredProjects extends Command
{
    protected $signature = 'projects:complete-expired';

    protected $description =
        'Mark expired projects as completed';

    public function handle()
    {
        $today = Carbon::today();

        $updated = Project::where('status', 'active')
            ->whereDate('end_date', '<', $today)
            ->update([
                'status' => 'completed'
            ]);

        $this->info(
            "{$updated} projects updated."
        );
    }
}