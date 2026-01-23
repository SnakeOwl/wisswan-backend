<?php

namespace App\Console\Commands;

use App\Models\UserLoginCode;
use Illuminate\Console\Command;

class DeleteOldAuthCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-old-auth-codes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes expired users codes from db';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $codes = UserLoginCode::where('expires_at', '<', now())->delete();

        info("DeleteOldAuthCodes: SUCCESS."); // TODO: <== delete after cheching on prod
    }
}
