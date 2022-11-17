<?php

namespace App\Handlers;

use Illuminate\Support\Facades\Http;

class JikanHandler
{
    public static function getAnimeCharacterById(int $id)
    {
        $url = 'https://api.jikan.moe/v4/anime/'. $id .'/characters';
        $response = Http::get($url);
        return $response->json();
    }
}