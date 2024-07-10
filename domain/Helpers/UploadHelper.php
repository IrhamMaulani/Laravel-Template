<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadHelper
{
    public function deleteFile(string $fileName): bool
    {
        if (file_exists(public_path('storage/' . $fileName))) {
            return @unlink(public_path('storage/' . $fileName));
        }
        return 'File not found';
    }

    /**
     * @param UploadedFile $uploadedFile
     * @param string $name
     * @param string $folder
     * @return string
     */
    public function uploadFile(UploadedFile $uploadedFile, string $name, string $folder): string
    {
        $timeStamp = Carbon::now()->timestamp;
        $name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $name);
        $fileName = $name . '_' . $timeStamp . '_' . uniqId();

        $imageExtension = ['png', 'jpeg', 'jpg', 'PNG', 'JPEG', 'JPG', 'webp', 'WEBP'];
        $safeFolders = ['banners'];
        $fileExtension = ['pdf', 'doc', 'docx', 'xls', 'xlsx'];
        $fileName = $fileName . "." . $uploadedFile->getClientOriginalExtension();

        if (in_array($uploadedFile->getClientOriginalExtension(), $imageExtension)) {
            $destination = public_path('storage/' . $folder . "/" . $fileName);
            Storage::disk('public')->putFileAs($folder, $uploadedFile, $fileName);
        }

        if (in_array($uploadedFile->getClientOriginalExtension(), $fileExtension)) {
            Storage::disk('public')->putFileAs($folder, $uploadedFile, $fileName);
        }

        return $folder . "/" . $fileName;
    }

}
