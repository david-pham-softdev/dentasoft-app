<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AsyncDbSystem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:async';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Async all data from all tables in the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->confirm('Are you sure you want to Async ALL data from the database? This action cannot be undone!', false)) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $tables = DB::select('SHOW TABLES');
            $dbName = env('DB_DATABASE');
            $key = "Tables_in_{$dbName}";

            foreach ($tables as $table) {
                $tableName = $table->$key;
                DB::table($tableName)->truncate();
                $this->info("Truncated table: $tableName");
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $this->info('All data has been Async successfully.');
        } else {
            $this->info('Operation cancelled.');
        }

        return 0;
    }
}
