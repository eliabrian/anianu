<?php

namespace App\Handlers;

use Illuminate\Support\Facades\Http;

class ConsumetHandler {
    public static function getStreamingSources(string $episodeId)
    {
        $url = config('anime.protocol') . "://" . config('anime.urls.consumet') . "/anime/enime/watch";
        
        $response = Http::get($url, ['episodeId' => $episodeId]);
        
        return $response->json();
    }
}