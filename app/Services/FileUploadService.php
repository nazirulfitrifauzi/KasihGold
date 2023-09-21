<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    public static function upload($file, $folder, $filename = null)
    {
        $fileExtension = $file->getClientOriginalExtension();
        $filePath = "public/Files/{$folder}";

        if (!$filename) {
            $filename = "file_" . uniqid() . ".{$fileExtension}";
        }

        Storage::disk('local')->putFileAs($filePath, $file, $filename);

        return url(Storage::url("{$filePath}/{$filename}"));
    }
}
