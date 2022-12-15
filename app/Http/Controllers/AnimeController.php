<?php

namespace App\Http\Controllers;

use App\Handlers\AnikatsuHandler;
use App\Handlers\ConsumetHandler;
use App\Handlers\EnimeHandler;
use Illuminate\Http\Request;
use App\Handlers\JikanHandler;

class AnimeController extends Controller
{
    public function show(string $id)
    {
        $jikan = JikanHandler::getAnimeById($id)['data'];
        $anime = EnimeHandler::getAnimeMapping($id);

        if (isset($anime['statusCode']) && $anime['statusCode'] === 404) {
            return abort(404);
        }
        
        if (!isset($anime['bannerImage']) && empty($anime['bannerImage'])) {
            $anime['bannerImage'] = $anime['coverImage'];
        }

        return view('anime.show', compact('jikan', 'anime'));
    }

    public function watch(string $id, string $episode)
    {
        $anime = JikanHandler::getAnimeById($id);
        $sources = [];
        
        $episodeDetails = EnimeHandler::getEpisodeInfo($episode);
        foreach ($episodeDetails['sources'] as $key => $source) {
            $sr = EnimeHandler::getStreamingSource($source['id']);
            $url = parse_url($source['url'], PHP_URL_HOST);
            if (str_contains($url, 'gogoanime')) {
                $key = 'gogoanime';
                $sources[$key]['referer'] = $sr['referer'];
                $sources[$key]['priority'] = $sr['priority']+ 1;
            }
        }
        
        $source['stream_link'] = "https://anikatsu.me/player/v1.php?id=" . $episodeDetails['sources'][0]['target'];

        $episode_id = $episode;

        $anikatsu['referer'] = "https://anikatsu.me/player/v1.php?id=" . $episodeDetails['sources'][0]['target'];
        $anikatsu['priority'] = 1;
        $sources['anikatsu'] = $anikatsu;

        return view('anime.watch', compact('episodeDetails', 'source', 'sources', 'id', 'episode_id', 'anime'));
    }

    public function search(Request $request)
    {
        $q = $request->query('q');
        $results = EnimeHandler::getAnimeBySearch($q)['data'];
        $animes = [];

        foreach ($results as $key => $anime) {
            $animes[$key]['images']['jpg']['large_image_url'] = $anime['coverImage'];
            $animes[$key]['title'] = $anime['title']['userPreferred'];
            $animes[$key]['score'] = $anime['averageScore'] / 10;
            $animes[$key]['mal_id'] = $anime['mappings']['mal'];

        }
        
        return view('anime.search', compact('animes', 'q'));
    }

    public function viewAll(string $type, Request $request)
    {
        $page = 1;

        if ($request->has('page')) {
            $page = $request->query('page');
        }

        switch ($type) {
            case 'seasonal':
                $title = 'Seasonal Anime';
                $animes = JikanHandler::getSeason(now: true, query: ['page' => $page, 'filter' => 'tv']);
                break;
            
            case 'airing':
                $title = 'Top Airing Anime';
                $animes = JikanHandler::getTopAnime(limit: 25, page: $page);
                break;
            default:
                # code...
                break;
        }

        return view('anime.all', compact('animes', 'title'));
    }
}
