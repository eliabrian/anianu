<?php

namespace App\Handlers;

use Illuminate\Support\Facades\Http;

class AnikatsuHandler
{
    const GET_RECENT_PATH = "getRecent";
    const GET_ANIME_PATH = "getAnime";
    const GET_EPISODE_PATH = "getEpisode";
    const GET_SEARCH_PATH = "search";

    public static function getRecentSub ()
    {
        $url = config('anikatsu.protocol') . '://' . config('anikatsu.url') . '/' . config('anikatsu.path');

        $response = Http::get($url . '/' . self::GET_RECENT_PATH . '/1/1' );

        return $response->json();
    }

    public static function getEpisode (string $episodeId)
    {
        $url = config('anikatsu.protocol') . '://' . config('anikatsu.url') . '/' . config('anikatsu.path');

        $response = Http::get($url . '/' . self::GET_EPISODE_PATH . '/' . $episodeId);

        return $response->json();
    }

    public static function getAnime (string $id)
    {
        $url = config('anikatsu.protocol') . '://' . config('anikatsu.url') . '/' . config('anikatsu.path');

        $response = Http::get($url . '/' . self::GET_ANIME_PATH . '/' . $id);

        return $response->json();
    }

    public static function getQuerySearch (string $query)
    {
        $url = config('anikatsu.protocol') . '://' . config('anikatsu.url') . '/' . config('anikatsu.path');

        $response = Http::get($url . '/' . self::GET_SEARCH_PATH . '/' . $query . '/1');
        
        return $response->json();
    }
}
