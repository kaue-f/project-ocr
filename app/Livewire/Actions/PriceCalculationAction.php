<?php

namespace App\Livewire\Actions;

use App\Enums\Language;
use Illuminate\Support\Str;

class PriceCalculationAction
{
    public function execute($ocr, $language)
    {
        $value = match ($language) {
            Language::EN->value => 0.20,
            Language::IT->value => 0.25,
        };

        $count = (int) Str::wordCount($ocr);

        $price = round($count * $value, 2);

        return [
            'numbers' => floatval($count),
            'price' => $price
        ];
    }
}