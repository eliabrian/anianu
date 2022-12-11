<?php

namespace App\Http\Controllers;

use App\Handlers\AnikatsuHandler;
use App\Handlers\EnimeHandler;
use App\Handlers\JikanHandler;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        // $latest = EnimeHandler::getAnimeRecent();
        $now = JikanHandler::getSeason(now: true)["data"];
        $now = array_slice($now, 0, 5);

        $top = JikanHandler::getTopAnime(limit: 5)['data'];


        return view('explore', compact('now', 'top'));
    }
}
