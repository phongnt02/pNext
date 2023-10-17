<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function show($name_folder_store, $file_name)
    {
        $filePath = $name_folder_store . '/' . $file_name;

        if (Storage::disk('store_server')->exists($filePath)) {
            $absolutePath = Storage::disk('store_server')->path($filePath);
            return response()->file($absolutePath, [
                'Content-Type' => 'video/mp4'
            ]);
        }

        abort(404);
    }
}
