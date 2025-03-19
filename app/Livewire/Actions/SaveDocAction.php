<?php

namespace App\Livewire\Actions;

use Livewire\WithFileUploads;

class SaveDocAction
{
    use WithFileUploads;
    public function execute($file)
    {
        $accessKey = env('AWS_ACCESS_KEY_ID');
        $secretKey = env('AWS_SECRET_ACCESS_KEY');
        $region = env('AWS_DEFAULT_REGION');
        $bucket = env('AWS_BUCKET');

        return (! $accessKey || ! $secretKey || ! $region || ! $bucket)
            ? $file->store('docs')
            : $file->store('docs', 's3');
    }
}

