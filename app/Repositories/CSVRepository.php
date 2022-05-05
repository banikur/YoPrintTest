<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;
use App\Models\tbl_upload_log;
use App\Imports\CsvImport;
use Maatwebsite\Excel\Facades\Excel;

class CSVRepository
{

    /**
     * CSVRepository constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * @param $file
     * @param $extension
     * @return mixed
     */
    public function uploadCSV($file, $extension)
    {
        return $this->upload($file, $extension);
    }

    /**
     * @param $file
     * @param $extension
     * @return mixed 
     */
    private function upload($file, $extension)
    {
        $path = Storage::putFileAs("__", $file, uniqid() . "." . $extension);
        $uploadedFile = tbl_upload_log::create([
            'path' => $path,
            'processed' => 0,
        ]);
        Excel::import(new CsvImport, request()->file('csv'));
        return $uploadedFile;
    }
}
