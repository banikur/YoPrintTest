<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('UNIQUE_KEY')->nullable();
            $table->string('PRODUCT_TITLE')->nullable();
            $table->text('PRODUCT_DESCRIPTION')->nullable();
            $table->string('STYLE#')->nullable();
            $table->string('AVAILABLE_SIZES')->nullable();
            $table->string('BRAND_LOGO_IMAGE')->nullable();
            $table->string('THUMBNAIL_IMAGE')->nullable();
            $table->string('COLOR_SWATCH_IMAGE')->nullable();
            $table->string('PRODUCT_IMAGE')->nullable();
            $table->string('SPEC_SHEET')->nullable();
            $table->string('PRICE_TEXT')->nullable();
            $table->string('SUGGESTED_PRICE')->nullable();
            $table->string('CATEGORY_NAME')->nullable();
            $table->string('SUBCATEGORY_NAME')->nullable();
            $table->string('COLOR_NAME')->nullable();
            $table->string('COLOR_SQUARE_IMAGE')->nullable();
            $table->string('COLOR_PRODUCT_IMAGE')->nullable();
            $table->string('COLOR_PRODUCT_IMAGE_THUMBNAIL')->nullable();
            $table->char('SIZE',5)->nullable();
            $table->integer('QTY')->nullable();
            $table->double('PIECE_WEIGHT',15,8)->nullable();
            $table->decimal('PIECE_PRICE')->nullable();
            $table->decimal('DOZENS_PRICE')->nullable();
            $table->decimal('CASE_PRICE')->nullable();
            $table->string('PRICE_GROUP')->nullable();
            $table->integer('CASE_SIZE')->nullable();
            $table->string('INVENTORY_KEY')->nullable();
            $table->double('SIZE_INDEX',15,8)->nullable();
            $table->string('SANMAR_MAINFRAME_COLOR')->nullable();
            $table->string('MILL')->nullable();
            $table->string('PRODUCT_STATUS')->nullable();
            $table->string('COMPANION_STYLES')->nullable();
            $table->decimal('MSRP',8,4)->nullable();
            $table->string('MAP_PRICING')->nullable();
            $table->string('FRONT_MODEL_IMAGE_URL')->nullable();
            $table->string('BACK_MODEL_IMAGE')->nullable();
            $table->string('FRONT_FLAT_IMAGE')->nullable();
            $table->string('BACK_FLAT_IMAGE')->nullable();
            $table->string('PRODUCT_MEASUREMENTS')->nullable();
            $table->string('PMS_COLOR')->nullable();
            $table->string('GTIN')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_inventories');
    }
}
