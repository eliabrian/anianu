<?php

namespace App\Handlers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class EnimeHandler
{
    private const RECENT_PATH = 'recent';
    private const POPULAR_PATH = 'popular';
    private const INFO_PATH = 'anime';
    private const EPISODE_PATH = 'episode';
    private const SOURCE_PATH = 'source';
    private const SEARCH_PATH = 'search';

    /**
     * Get recent Animes
     * 
     * @param int $page
     * @param int $perPage
     * 
     * @return array
     */
    public static function getAnimeRecent(int $page = 1, int $perPage = 20)
    {
        try {
            $url = config('anime.protocol') . "://" . config('anime.urls.enime') . "/" . self::RECENT_PATH;

            $response = Http::get($url, [
                'page' => $page,
                'perPage' => $perPage
            ]);

            return $response->json();

        } catch (Throwable $th) {

            Log::error($th);

            return abort(500);
        }
    }

    public static function getPopularAnime(int $page = 1, int $perPage = 20)
    {
        try {
            $url = config('anime.protocol') . "://" . config('anime.urls.enime') . "/" . self::POPULAR_PATH;

            $response = Http::get($url, [
                'page' => $page,
                'perPage' => $perPage
            ]);

            return $response->json();

        } catch (Throwable $th) {

            Log::error($th);

            return abort(500);
        }
    }

    /**
     * Get Anime info by slug
     * 
     * @param string $slug
     * @param bool $ommit_episode
     * 
     * @return array
     */
    public static function getAnimeInfo(string $slug, bool $ommit_episode = false)
    {
        try {
            $url = config('anime.protocol') . "://" . config('anime.urls.enime') . "/" . self::INFO_PATH . "/" . $slug;

            $response = Http::get($url, [
                'ommit_episode' => true,
            ]);

            return $response->json();

        } catch (Throwable $th) {

            Log::error($th);

            return abort(500);
        }
    }

    public static function getEpisodeInfo(string $episode_id)
    {
        $url = config('anime.protocol') . "://" . config('anime.urls.enime') . "/" . self::EPISODE_PATH . "/" . $episode_id;

        $response = Http::get($url);

        return $response->json();
    }

    public static function getStreamingSource(string $source_id)
    {
        $url = config('anime.protocol') . "://" . config('anime.urls.enime') . "/" . self::SOURCE_PATH . "/" . $source_id;

        $response = Http::get($url);

        return $response->json();
    }

    public static function getAnimeBySearch(string $q)
    {
        $url = config('anime.protocol') . "://" . config('anime.urls.enime') . "/" . self::SEARCH_PATH . "/" . $q;

        $response = Http::get($url);

        return $response->json();

    }
}
