<?php

use App\Livewire\OcrExtractor;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('ocr.extractor');
});

Route::get('extractor-ocr', OcrExtractor::class)->name('ocr.extractor');
