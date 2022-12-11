@extends('layouts.base')

@section('title', $jikan['title'])

@section('content')
<div class="anime-show mt-2">
    <div class="lg:96 h-96 w-full bg-no-repeat bg-cover bg-top" style="background-image: url({{$anime['bannerImage']}})">
        <div class="h-full bg-gradient-to-b from-transparent via-black/50 to-black lg:from-transparent lg:to-black"></div>
    </div>
    
    <div class="lg:px-56 flex flex-col lg:flex-row container items-center lg:items-start mx-auto lg:mt-4">
        <div class="image-cover absolute lg:top-80 top-36 h-75 w-50">
            <img src="{{ $jikan['images']['jpg']['large_image_url'] }}" alt="{{ $jikan['title'] }}" class="rounded-md border-2 border-slate-200 drop-shadow-lg">
        </div>
        <div class="anime-desc lg:ml-60 mx-4 my-6">
            <p class="text-4xl font-bold mb-4 text-center lg:text-start">{{ $jikan['title'] }}</p>
            <p class="mb-2 lg:mb-4 font-semibold text-lg text-slate-500 text-center lg:text-start">
                <a class="block lg:inline bg-white p-2 rounded-full lg:mr-1 mb-4 lg:mb-0 text-sm text-black" href="{{ route('anime.watch', ['id' => $jikan['mal_id'], 'episode' => $anime['episodes'][0]['id']]) }}">Watch Now</a>
                {{ $jikan['status'] }} &#9679; {{ $jikan['episodes'] }} Episode(s)
            </p>
            <p class="line-clamp-5" id="anime-desc">{!! $anime['description'] !!}</p> <button id="show-more-desc" class="underline underline-offset-4">Show more</button>
        </div>
    </div>
</div>
@endsection