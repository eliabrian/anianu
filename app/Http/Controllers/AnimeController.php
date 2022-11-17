<?php

namespace App\Http\Controllers;

use App\Handlers\AnikatsuHandler;
use App\Handlers\ConsumetHandler;
use App\Handlers\EnimeHandler;
use Illuminate\Http\Request;
use App\Handlers\JikanHandler;

class AnimeController extends Controller
{
    public function show(string $slug)
    {
        $anime = EnimeHandler::getAnimeInfo($slug);

        if (empty($anime['bannerImage'])) {
            $anime['bannerImage'] = $anime['coverImage'];
        }

        $characters = JikanHandler::getAnimeCharacterById($anime['mappings']['mal']);

        return view('anime.show', compact('anime', 'characters'));
    }

    public function watch(string $anime, string $episode)
    {
        $episodeDetails = EnimeHandler::getEpisodeInfo($episode);
        
        $source = AnikatsuHandler::getEpisode($episodeDetails['sources'][0]['target']);
        $source['ep_download'] = str_replace("Gogoanime", "AniKatsu", $source['ep_download']);
        $source['stream_link'] = "https://anikatsu.me/player/v1.php?id=" . $episodeDetails['sources'][0]['target'] . "&download=" . $source['ep_download'];
        $source['ep_num'] = (int)$source['ep_num'];
        
        return view('anime.watch', compact('episodeDetails', 'source'));
    }

    public function search(Request $request)
    {
        $results = EnimeHandler::getAnimeBySearch($request->query('q'));
        
        return view('anime.search', compact('results'));
    }
}
