<?php

namespace App\Services;

use App\Models\DocumentTranslation;
use App\Livewire\Actions\SaveDocAction;
use App\Livewire\Forms\TextExtractionOCRForm;
use App\Livewire\Actions\PriceCalculationAction;

class ExtractorService
{
    public function process(TextExtractionOCRForm $textExtractionOCRForm)
    {
        $ocr = "In addition to toggling the visibility of entire elements, it's often useful to change the styling of an existing element by toggling CSS classes on and off during requests to the server. This technique can be used for things like changing background colors, lowering opacity, triggering spinning animations, and more.";

        $numbersPrice = app(PriceCalculationAction::class)->execute($ocr, $textExtractionOCRForm->targetLanguage);

        $path = app(SaveDocAction::class)->execute($textExtractionOCRForm->file);

        return DocumentTranslation::create([
            'name' => $textExtractionOCRForm->name,
            'email' => $textExtractionOCRForm->email,
            'country_code' => $textExtractionOCRForm->countryCode,
            'phone' => $textExtractionOCRForm->phone,
            'source_language' => $textExtractionOCRForm->sourceLanguage,
            'target_language' => $textExtractionOCRForm->targetLanguage,
            'path' => $path,
            'ocr_text' => $ocr,
            'numbers_words' => $numbersPrice['numbers'],
            'price' => $numbersPrice['price'],
        ]);

    }
}