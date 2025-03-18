<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Enums\Language;
use Livewire\Attributes\Validate;

class TextExtractionOCRForm extends Form
{
    #[Validate('required', message: 'O nome é obrigatório.')]
    #[Validate('min:3', message: 'O nome deve conter no mínimo 3 caracteres.')]
    #[Validate('max:100', message: 'O nome deve conter no máximo 100 caracteres.')]
    public string $name;

    #[Validate('required', message: 'E-mail obrigatório.')]
    #[Validate('email', message: 'Padrão de email inválido.')]
    public string $email;

    #[Validate('required', message: 'O número de telefone é obrigatório.')]
    public string $phone;

    #[Validate('nullable')]
    public string $countryCode;

    #[Validate('required', message: 'O idioma de origem é obrigatório')]
    public string $sourceLanguage = Language::PT->name;

    #[Validate('required', message: 'O idioma de destino é obrigatório')]
    public string $targetLanguage = Language::EN->name;

    #[Validate('required', message: 'Arquivo é obrigatório.')]
    #[Validate('file', message: 'O arquivo enviado deve ser um arquivo válida.')]
    #[Validate('max:10240', message: 'A imagem deve ter no máximo 10MB.')]
    #[Validate('mimes:jpg,png,pdf,doc,docx,xls,xlsc', message: 'Formato de arquivo inválido. Tipo de arquivos permitidos: PNG, JPG, PDF, DOC, DOCX, XLS, XLSX.')]
    public $file;

    public function getUser($user)
    {
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function validateForm()
    {
        $this->validate();

        if ($this->sourceLanguage == $this->targetLanguage) {
            $this->addError(
                'sourceLanguage',
                'O idioma de origem e destino não podem ser iguais.'
            );

            $this->addError(
                'targetLanguage',
                'O idioma de origem e destino não podem ser iguais.'
            );
            return false;
        } else if ($this->sourceLanguage != Language::PT->name || $this->targetLanguage != Language::PT->name) {
            $this->addError(
                'sourceLanguage',
                'Um dos idiomas deve ser Português.'
            );

            $this->addError(
                'targetLanguage',
                'Umas dos idiomas deve ser Português.'
            );
        }

        return true;
    }

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->sourceLanguage = Language::PT->name;
        $this->targetLanguage = Language::EN->name;
        $this->file;
    }
}
