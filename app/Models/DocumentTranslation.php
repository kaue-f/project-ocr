<?php

namespace App\Models;

use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DocumentTranslation extends Model
{
    use HasUuids, SoftDeletes;
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'email',
        'country_code',
        'phone',
        'source_language',
        'target_language',
        'path',
        'ocr_text',
        'numbers_words',
        'price',
    ];
}
