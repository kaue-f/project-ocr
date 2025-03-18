<?php

namespace App\Livewire;

use Flux\Flux;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Services\ExtractorService;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\TextExtractionOCRForm;

class OcrExtractor extends Component
{
    use WithFileUploads;
    public TextExtractionOCRForm $form;
    public $numbersWords = 0;
    public $price = 0;

    #[Title('Extração de Texto OCR')]

    public function render()
    {
        return view('livewire.ocr-extractor');
    }

    public function mount()
    {
        if (Auth::check()) {
            $this->form->getUser(Auth::user());
        }
    }

    public function save(ExtractorService $extractor)
    {
        if ($this->form->validateForm()) {
            $result = $extractor->process($this->form);
            dd($result);
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
