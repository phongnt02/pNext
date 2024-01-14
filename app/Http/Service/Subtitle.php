<?php

namespace App\Http\Service;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class Subtitle
{
    public function saveSubtitleDefault($nameFolderStore, $path_video)
    {
        $params = explode('/', $path_video);
        $url = route('resource.show', [
            'name_folder_store' => $params[0],
            'file_name' => $params[1],
        ]);

        try {
            $client = new Client();
            $response = $client->post('http://127.0.0.1:5000/api/subtitles/', [
                'multipart' => [
                    [
                        'name' => 'path_video',
                        'contents' => $url,
                    ],
                ],
            ]);

            if ($response->hasHeader('Content-Disposition')) {
                $contentDisposition = $response->getHeader('Content-Disposition')[0];

                preg_match('/filename="(.+)"/', $contentDisposition, $matches);

                if (isset($matches[1])) {
                    $subtitleContent = $response->getBody()->getContents();
                    $vttFilename = $params[1] . '_en' . '.vtt';
                    $path = Storage::disk('store_server')->put($nameFolderStore . '/' . $vttFilename, $subtitleContent);
                    if ($path) {
                        $relativePath = $nameFolderStore . '/' . $vttFilename;

                        return Storage::url($relativePath);
                    }
                }
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function translateSubtitle($language, $pathFileVttEn, $nameFolderStore, $path_video) {
        $params = explode('/', $path_video);
        
        try {
            $vttContent  = Storage::disk('store_server')->get($pathFileVttEn);

            $client = new Client();
            $response = $client->post('http://127.0.0.1:5000/api/translateVtt/', [
                'multipart' => [
                    [
                        'name' => 'lang',
                        'contents' => $language,
                    ],
                    [
                        'name' => 'webvtt',
                        'contents' => $vttContent,
                    ]
                ],
            ]);

            if ($response->hasHeader('Content-Disposition')) {
                $contentDisposition = $response->getHeader('Content-Disposition')[0];

                preg_match('/filename="(.+)"/', $contentDisposition, $matches);

                if (isset($matches[1])) {
                    $subtitleContent = $response->getBody()->getContents();
                    $vttFilename = $params[1] . '_' . $language . '.vtt';
                    $path = Storage::disk('store_server')->put($nameFolderStore . '/' . $vttFilename, $subtitleContent);
                    if ($path) {
                        $relativePath = $nameFolderStore . '/' . $vttFilename;

                        return Storage::url($relativePath);
                    }
                }
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
