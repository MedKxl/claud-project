<?php

namespace App\Helpers;

use Google\Cloud\Storage\StorageClient;
use Illuminate\Support\Facades\Log;

class GCSUploader
{
    public static function upload($localPath, $bucketName, $remotePath)
    {
        $keyFilePath = base_path(env('GOOGLE_CLOUD_KEY_FILE'));

        $storage = new StorageClient([
            'keyFilePath' => $keyFilePath,
        ]);

        $bucket = $storage->bucket($bucketName);
        $bucket->upload(fopen($localPath, 'r'), [
            'name' => $remotePath,
        ]);

        return "https://storage.googleapis.com/$bucketName/$remotePath";
    }
}
