<?php

namespace Qihucms\Search\Models;

use Illuminate\Database\Eloquent\Model;

class SearchKeyword extends Model
{
    /**
     * @var array $fillable
     */
    protected $fillable = [
        'keyword', 'type_uri', 'count'
    ];

    /**
     * @var array $casts
     */
    protected $casts = [
        'count' => 'integer',
    ];
}
