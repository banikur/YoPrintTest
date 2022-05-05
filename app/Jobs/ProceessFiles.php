<?php

namespace App\Jobs;

use App\Models\tbl_inventory;
use Illuminate\Bus\Queueable;
// use Illuminate\Bus\Batchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ProceessFiles implements ShouldQueue
{
    use  Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $header;
    public $data;

    public function __construct($data, $header)
    {
        $this->data = $data;
        $this->header = $header;
    }

    public function handle()
    {
        // foreach ($this->data as $sale) {
        //     // $sellData = array_combine($this->header, $sale);
        //     tbl_inventory::create($sale);
        // }
        if ($this->files) {
            // Do a foreach loop here and do whatever logic you need. The $this->files will be passed from the controller, so you will have access to all the data here
        }
    }
}
