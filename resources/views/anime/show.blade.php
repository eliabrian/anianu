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

    {{-- @if (!empty($anime['relations']))
    <div class="anime-relations lg:mx-56 mx-4 mt-4">
        <p class="text-3xl font-bold mb-4">Related to {{ $anime['title']['userPreferred'] }}</p>

        <div class="grid gap-4 lg:grid-cols-5 grid-cols-2">
            @foreach ($anime['relations'] as $anime)
            <div class="card w-36 lg:w-64 mb-4 h-72 lg:h-full">
                <div class="card-image mb-2">
                    <a href="{{ route('anime.show', ['slug' => $anime['anime']['slug']]) }}">
                        <img src="{{ $anime['anime']['coverImage'] }}" alt="{{ $anime['anime']['title']['userPreferred'] }}" class="h-56 lg:h-96 object-cover rounded-lg">
                    </a>
                </div>
                <div class="card-info">
                    <div class="title truncate font-bold">
                        <div class="episode text-sm text-gray-500 font-semibold">Eps {{ $anime['anime']['currentEpisode'] }}</div>
                        <a href="{{ route('anime.show', $anime['anime']['slug']) }}">{{ $anime['anime']['title']['userPreferred'] }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif --}}
    
    {{-- @if (!empty($characters['data']))    
    <div class="anime-characters lg:mx-56 mx-4">
        <p class="text-3xl font-bold mb-4">Characters</p>
        <div class="grid gap-4 lg:grid-cols-4 md:grid-cols-3 grid-cols-2 overflow-x-scroll h-30">
            @foreach ($characters['data'] as $character)
            <div class="card lg:mb-4">
                <div class="card-image h-fit">
                    <img src="{{ $character['character']['images']['webp']['image_url'] }}" alt="asdasd" class="w-full xl:h-96 object-cover rounded-lg">
                </div>
                <div class="card-desc mt-1">
                    <div class="title truncate font-bold">
                        {{ $character['character']['name'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif --}}

</div>
@endsection