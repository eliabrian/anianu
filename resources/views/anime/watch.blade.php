@extends('layouts.base')

@section('title', $episodeDetails['title'])

@section('content')
<div class="anime-watch mx-2 lg:my-8 my-2">
    <div class="lg:flex lg:mx-10">
        <div class="lg:w-3/4 rounded-lg mb-2 lg:mb-0">
            <div class="lg:aspect-w-16 lg:aspect-h-9 aspect-w-4 aspect-h-3">
                <iframe class="rounded-lg" src="{{ $source['stream_link'] }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <p class="text-2xl font-bold mt-4 text-center lg:text-left"><a href="{{ route('anime.show', ['id' => $id]) }}">{{ $episodeDetails['anime']['title']['userPreferred'] }} </a></p>
            <p class="text-lg text-gray-500 font-bold text-center lg:text-left">Episode {{ $episodeDetails['number'] }} : {{ $episodeDetails['title'] }}</p>
        </div>
        <div class="lg:w-1/4 lg:ml-6 lg:mr-14 md:mx-6 rounded-lg">
            <p class="text-2xl font-semibold pb-2">Episode List</p>
            <div class="overflow-auto 2xl:h-43 lg:h-30 h-30 text-justify">
                <hr class="mb-2 h-px bg-gray-200 border-0 dark:bg-gray-700">
                @foreach ($episodeDetails['anime']['episodes'] as $episode)
                <a href="{{ route('anime.watch', ['id' => $id, 'episode' => $episode['id']]) }}">
                    <div class="flex items-center lg:mb-3 md:mb-4 mb-3">
                        @if ($episode['image'])    
                        <div class="lg:w-1/2 md:w-1/3 w-1/3 relative hover:text-white">
                            <img class="rounded-lg h-20 w-full object-cover" src="{{ $episode['image'] }}" alt="{{ $episode['id'] }}">
                            @if ($episode_id == $episode['id'])    
                            <div class="w-full h-full absolute top-0 bg-gray-700/75 rounded-lg">
                                <div class="font-bold flex items-center justify-center w-full h-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path d="M5.75 3a.75.75 0 00-.75.75v12.5c0 .414.336.75.75.75h1.5a.75.75 0 00.75-.75V3.75A.75.75 0 007.25 3h-1.5zM12.75 3a.75.75 0 00-.75.75v12.5c0 .414.336.75.75.75h1.5a.75.75 0 00.75-.75V3.75a.75.75 0 00-.75-.75h-1.5z" />
                                    </svg>                                      
                                </div>
                            </div>
                            @endif
                        </div>
                        @else
                        <div class="lg:w-1/2 md:w-1/3 w-1/3 relative">
                            <img class="rounded-lg 2xl:h-28 lg:h-20 md:h-36 h-16 w-full object-cover" src="{{ $anime['data']['images']['webp']['large_image_url'] }}" alt="{{ $episode['id'] }}">
                            <div class="absolute font-bold">{{ $episode_id == $episode['id'] ? 'Playing: ' : '' }}</div>
                        </div>
                        @endif
                        <div class="lg:w-1/2 md:w-2/3 w-2/3 hover:text-slate-500">
                            <div class="episode-card px-5 py-2 my-2">
                                <p class="font-semibold line-clamp-2 {{ $episode_id == $episode['id'] ? 'text-gray-500' : '' }}">Episode {{ $episode['number'] }}</p>
                                <p class="text-sm line-clamp-2 text-left text-gray-500">{{ \Carbon\Carbon::createFromTimestamp(strtotime($episode['airedAt']))->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                <hr class="mt-2 h-px bg-gray-200 border-0 dark:bg-gray-700">
            </div>
        </div>
    </div>
</div>
@endsection