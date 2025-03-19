<?php

namespace App\Livewire;

use App\Enums\Language;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Number;
use Livewire\Attributes\Title;
use App\Services\ExtractorService;
use App\Livewire\Forms\TextExtractionOCRForm;

class OcrExtractor extends Component
{
    use WithFileUploads;
    public TextExtractionOCRForm $form;
    public string $numbersWords = '0';
    public string $price = 'R$ 0,00';

    #[Title('Extração de Texto OCR')]
    public function render()
    {
        return view('livewire.ocr-extractor');
    }

    public function save(ExtractorService $extractor)
    {
        if ($this->form->validateForm()) {
            $this->resetErrorBag();
            $result = $extractor->process($this->form);

            if ($result == false) {
                $this->numbersWords = 'Erro no processamento do OCR';
                $this->price = 'Erro no processamento do OCR';
                return;
            }

            $this->numbersWords = $result->numbers_words;
            $this->price = Number::currency($result->price, in: 'BRL', locale: 'pt_br');
        }
    }

    public function setErrorMessage($message)
    {
        $this->addError('phone', $message);
    }

    public function cancel()
    {
        $this->form->resetForm();
    }
}
