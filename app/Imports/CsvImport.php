<?php

namespace App\Imports;

use App\Models\tbl_inventory;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Queue\ShouldQueue;

class CsvImport implements ToCollection, WithChunkReading, WithStartRow, WithMultipleSheets, ShouldQueue
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function model(array $row)
    // {
    //     return new tbl_inventory([
    //         'UNIQUE_KEY' => $row[1],
    //         'PRODUCT_TITLE' => $row[1],
    //         'PRODUCT_DESCRIPTION' => $row[1],
    //         'STYLE#' => $row[1],
    //         'AVAILABLE_SIZES' => $row[1],
    //         'BRAND_LOGO_IMAGE' => $row[1],
    //         'THUMBNAIL_IMAGE' => $row[1],
    //         'COLOR_SWATCH_IMAGE' => $row[1],
    //         'PRODUCT_IMAGE' => $row[1],
    //         'SPEC_SHEET' => $row[1],
    //         'PRICE_TEXT' => $row[1],
    //         'SUGGESTED_PRICE' => $row[1],
    //         'CATEGORY_NAME' => $row[1],
    //         'SUBCATEGORY_NAME' => $row[1],
    //         'COLOR_NAME' => $row[1],
    //         'COLOR_SQUARE_IMAGE' => $row[1],
    //         'COLOR_PRODUCT_IMAGE' => $row[1],
    //         'COLOR_PRODUCT_IMAGE_THUMBNAIL' => $row[1],
    //         'SIZE' => $row[1],
    //         'QTY' => $row[1],
    //         'PIECE_WEIGHT' => $row[1],
    //         'PIECE_PRICE' => $row[1],
    //         'DOZENS_PRICE' => $row[1],
    //         'CASE_PRICE' => $row[1],
    //         'PRICE_GROUP' => $row[1],
    //         'CASE_SIZE' => $row[1],
    //         'INVENTORY_KEY' => $row[1],
    //         'SIZE_INDEX' => $row[1],
    //         'SANMAR_MAINFRAME_COLOR' => $row[1],
    //         'MILL' => $row[1],
    //         'PRODUCT_STATUS' => $row[1],
    //         'COMPANION_STYLES' => $row[1],
    //         'MSRP' => $row[1],
    //         'MAP_PRICING' => $row[1],
    //         'FRONT_MODEL_IMAGE_URL' => $row[1],
    //         'BACK_MODEL_IMAGE' => $row[1],
    //         'FRONT_FLAT_IMAGE' => $row[1],
    //         'BACK_FLAT_IMAGE' => $row[1],
    //         'PRODUCT_MEASUREMENTS' => $row[1],
    //         'PMS_COLOR' => $row[1],
    //         'GTIN' => $row[1]
    //     ]);
    // }
    public function sheets(): array
    {
        return [
            0 => $this,
        ];
    }
    public function collection(Collection $collection)
    {
        DB::beginTransaction();
        try {
            foreach ($collection->chunk(1000) as $i => $chunk) {
                $i = 0;
                foreach ($chunk as $key => $row) {
                    $sts = tbl_inventory::insert([
                        'UNIQUE_KEY' => $row[0],
                        'PRODUCT_TITLE' => $row[1],
                        'PRODUCT_DESCRIPTION' => $row[2],
                        'STYLE#' => $row[3],
                        'AVAILABLE_SIZES' => $row[4],
                        'BRAND_LOGO_IMAGE' => $row[5],
                        'THUMBNAIL_IMAGE' => $row[6],
                        'COLOR_SWATCH_IMAGE' => $row[7],
                        'PRODUCT_IMAGE' => $row[8],
                        'SPEC_SHEET' => $row[9],
                        'PRICE_TEXT' => $row[10],
                        'SUGGESTED_PRICE' => $row[11],
                        'CATEGORY_NAME' => $row[12],
                        'SUBCATEGORY_NAME' => $row[13],
                        'COLOR_NAME' => $row[14],
                        'COLOR_SQUARE_IMAGE' => $row[15],
                        'COLOR_PRODUCT_IMAGE' => $row[16],
                        'COLOR_PRODUCT_IMAGE_THUMBNAIL' => $row[17],
                        'SIZE' => $row[18],
                        'QTY' => $row[19],
                        'PIECE_WEIGHT' => $row[20],
                        'PIECE_PRICE' => $row[21],
                        'DOZENS_PRICE' => $row[22],
                        'CASE_PRICE' => $row[23],
                        'PRICE_GROUP' => $row[24],
                        'CASE_SIZE' => $row[25],
                        'INVENTORY_KEY' => $row[26],
                        'SIZE_INDEX' => $row[27],
                        'SANMAR_MAINFRAME_COLOR' => $row[28],
                        'MILL' => $row[29],
                        'PRODUCT_STATUS' => $row[30],
                        'COMPANION_STYLES' => $row[31],
                        'MSRP' => $row[32],
                        'MAP_PRICING' => $row[33],
                        'FRONT_MODEL_IMAGE_URL' => $row[34],
                        'BACK_MODEL_IMAGE' => $row[35],
                        'FRONT_FLAT_IMAGE' => $row[36],
                        'BACK_FLAT_IMAGE' => $row[37],
                        'PRODUCT_MEASUREMENTS' => $row[38],
                        'PMS_COLOR' => $row[39],
                        'GTIN' => $row[40]
                    ]);
                    $i++;
                }
            }
            DB::commit();
            return $i;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function startRow(): int
    {
        return 5;
    }

    public function batchSize(): int
    {
        return 50;
    }

    public function chunkSize(): int
    {
        return 50;
    }


}
