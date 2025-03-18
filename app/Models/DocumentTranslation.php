<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentTranslation extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'source_language',
        'target_language',
        'path',
        'ocr_text',
        'numbers_words',
        'price',
    ];
}
