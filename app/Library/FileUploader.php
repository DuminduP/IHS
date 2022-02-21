<?php

namespace App\Library;

use App\Models\GrievanceFile;

class FileUploader
{

    //handel file uploads
    public static function upload($file, $grievance_id)
    {
        if (isset($file['name'])) {
            $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $newFileName = $grievance_id . '-' . uniqid() . '.' . $fileExtension;
            $target_path = public_path('grievanceFiles') . "/" . basename($newFileName);
            if (move_uploaded_file($file['tmp_name'], $target_path)) {
                $gf = new GrievanceFile();
                $gf->name = $newFileName;
                $gf->grievance_id = $grievance_id;
                $gf->type = $fileExtension;
                $gf->save();
            }
        }
    }
}
