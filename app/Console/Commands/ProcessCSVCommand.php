<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\tbl_upload_log;

use Illuminate\Support\Facades\Storage;

class ProcessCSVCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process an uploaded CSV file';

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
     * @return mixed
     */
    public function handle()
    {
        try {
            //Retrieve only no processed files:
            $invoices = tbl_upload_log::notProcessed()->get();
            if (count($invoices) < 1) {
                $this->info('No files found');
                return;
            }
            //Process the files:
            $invoices->map(function ($invoice) {
                $file = fopen("storage/app/" . $invoice->path, "r");
                while (!feof($file)) {
                    $line = fgets($file);
                    //Here you have a loop to each line of the file, and can do whatever you need with this line:
                    if (strlen($line) > 0) { //If the line is not empty:
                        // Add your logic here:
                    }
                    // Don't forgot to change your `processed` flag to true:
                    $invoice->processed = 1;
                    $invoice->save();
                }
            });
        } catch (\Exception $exception) {
            $this->error("Something went wrong");
            return $exception->getMessage();
        }
    }
}
