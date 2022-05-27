<?php

namespace Squarepeg\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * public int $limit
 * public string $type
 * public int $occurrences
 */
class Occurrence extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'limit',
        'type',
        'occurrences',
    ];
}
