<?php

namespace App\Handlers;

use Illuminate\Support\Facades\Http;

class JikanHandler
{
    private const ANIME_PATH = 'anime';
    private const TOP_PATH = 'top';
    private const SEASON_PATH = 'seasons';
    private const NOW_PATH = 'now';
    private const FULL_PATH = 'full';

    private static function fetchData(string $url, array $query = [])
    {
        $response = Http::get($url, $query);

        return $response->json();
    }

    public static function getAnimeCharacterById(int $id)
    {
        $url = 'https://api.jikan.moe/v4/anime/'. $id .'/characters';
        $response = Http::get($url);
        return $response->json();
    }

    public static function getSeason(bool $now = false, string $year = "", string $season = "", array $query = [])
    {
        $url = config('anime.protocol') . "://" . config('anime.urls.jikan') . "/" . self::SEASON_PATH . "/" . self::NOW_PATH;
        
        if (!$now) {
            $url = config('anime.protocol') . "://" . config('anime.urls.jikan') . "/" . self::SEASON_PATH . "/" . $year . "/" . $season;
        }

       if (empty($query)) {
            $query = [
                'filter' => 'tv',
                'page' => 1,
            ];
       }

        return self::fetchData($url, $query);
    }

    public static function getTopAnime(string $type = "tv", string $filter = "airing", int $page = 1, int $limit = 10)
    {
        $url = config('anime.protocol') . "://" . config('anime.urls.jikan') . "/" . self::TOP_PATH . "/" . self::ANIME_PATH;

        $query = compact('type', 'filter', 'page', 'limit');

        return self::fetchData($url, $query);
    }

    public static function getAnimeById(string $id, bool $full = false)
    {
        $url = config('anime.protocol') . "://" . config('anime.urls.jikan') . "/" . self::ANIME_PATH . "/" . $id . '/';
        $url = $full ? $url . self::FULL_PATH : $url;

        return self::fetchData($url);
    }

    public static function searchAnimeByQuery(string $q, string $type = 'tv', bool $sfw = true, string $sort = 'asc')
    {
        $url = config('anime.protocol') . "://" . config('anime.urls.jikan') . "/" . self::ANIME_PATH;
        $query = compact('q', 'type', 'sfw', 'sort');

        return self::fetchData($url, $query);
    }
}