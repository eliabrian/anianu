<?php

namespace App\Http\Controllers;

use App\Handlers\AnikatsuHandler;
use App\Handlers\EnimeHandler;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $latest = EnimeHandler::getAnimeRecent();
        $popular = EnimeHandler::getPopularAnime();
        
        return view('explore', compact('latest', 'popular'));
    }
}
