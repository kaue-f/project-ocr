<?php

namespace App\Services;

use App\Models\DocumentTranslation;
use App\Livewire\API\CloudVisionAPI;
use App\Livewire\Actions\SaveDocAction;
use App\Livewire\Forms\TextExtractionOCRForm;
use App\Livewire\Actions\PriceCalculationAction;

class ExtractorService
{
    public function process(TextExtractionOCRForm $textExtractionOCRForm)
    {
        $ocr = app(CloudVisionAPI::class)->analyze($textExtractionOCRForm->file);

        if (empty($ocr)) {
            return false;
        }

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
