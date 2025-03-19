<?php

namespace App\API;

use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;

class CloudVisionAPI
{
    public function analyze($doc)
    {
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path(env('GOOGLE_APPLICATION_CREDENTIALS')));

        $imageAnnotator =  new ImageAnnotatorClient();

        try {
            $data = file_get_contents($doc);

            $response = $imageAnnotator->annotateImage($data, [Type::LABEL_DETECTION]);
            $result = $response->getLabelAnnotations();

            $labels = [];
            foreach ($result as $value) {
                $labels[] = $value->getDescription();
            }

            $imageAnnotator->close();

            return $labels;
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
