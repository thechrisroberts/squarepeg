<?php

namespace Squarepeg\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * public int $param
 * public string $type
 * public int $occurrences
 */
class Occurrence extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'param',
        'type',
        'occurrences',
    ];
}
