@extends('layouts.base')

@section('title', $episodeDetails['title'])

@section('content')
<div class="anime-watch mx-2 my-2">
    <div class="lg:flex lg:mx-10">
        <div class="lg:w-3/4 rounded-lg mb-2 lg:mb-0">
            <div class="lg:aspect-w-16 lg:aspect-h-9 aspect-w-4 aspect-h-3">
                <iframe class="rounded-lg" src="{{ $source['stream_link'] }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <p class="text-2xl font-bold mt-4 text-center lg:text-left"><a href="{{ route('anime.show', ['slug' => $episodeDetails['anime']['slug']]) }}">{{ $episodeDetails['anime']['title']['userPreferred'] }} </a></p>
            <p class="text-lg text-slate-500 font-bold text-center lg:text-left">Episode {{ $episodeDetails['number'] }} : {{ $episodeDetails['title'] }}</p>
        </div>
        <div class="lg:w-1/4 lg:ml-6 rounded-lg ">
            <p class="text-2xl font-semibold mb-2 p-4">Episode List</p>
            <div class="overflow-auto xl:h-43 lg:h-30 h-30 text-justify">
                @foreach ($episodeDetails['anime']['episodes'] as $episode)
                <div class="flex items-center">
                    @if ($episode['image'])    
                    <div class="w-1/3">
                        <img class="rounded-lg" src="{{ $episode['image'] }}" alt="asdas">
                    </div>
                    @endif
                    <div class="w-2/3">
                        <div class="episode-card hover:text-slate-500 {{ $episode['number'] === $source['ep_num'] ? 'text-slate-500' :'' }} px-5 py-2">
                            <a href="{{ route('anime.watch', ['slug' => $episodeDetails['anime']['slug'], 'episode' => $episode['id']]) }}">
                                <p class="font-semibold">Episode {{ $episode['number'] }}</p>
                                <p class="text-sm line-clamp-2 text-left">{{ $episode['title'] }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                @endforeach
            </div>
        </div>
    </div>
    
    {{-- <iframe class="aspect-video rounded-lg shadow-lg" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe> --}}
    {{-- <iframe class="w-full min-h-screen aspect-video " src="{{ $source['headers']['Referer'] }}"></iframe> --}}
    
</div>
@endsection