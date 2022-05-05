<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class tbl_upload_log extends Model
{
    protected $table = 'tbl_upload_logs';
    protected $fillable = [
        'filename',
        'status',
        'path',
        'processed'
    ];

    public function scopeNotProcessed(Builder $query)
    {
        return $this->where('processed', '=', 0);
    }
}
