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
        $episodeDetails = EnimeHandler::getEpisodeInfo($episode);
        
        $source['stream_link'] = "https://anikatsu.me/player/v1.php?id=" . $episodeDetails['sources'][0]['target'];
        
        return view('anime.watch', compact('episodeDetails', 'source'));
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
}
