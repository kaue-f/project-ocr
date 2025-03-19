<?php

namespace App\Livewire\Actions;

use App\Enums\Language;
use Illuminate\Support\Str;

class PriceCalculationAction
{
    public function execute($ocr, $language): array
    {
        $value = Language::getValue($language);

        $count = (int) Str::wordCount($ocr[0]);

        $price = round($count * $value, 2);

        return [
            'numbers' => $count,
            'price' => floatval($price)
        ];
    }
}
