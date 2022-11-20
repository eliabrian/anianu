@extends('layouts.base')

@section('title', 'Explore')

@section('content')
<div class="explore px-10 my-6">
    <div class="recent-update mb-6">
        <h2 class="text-2xl lg:text-3xl font-semibold mb-6">Recent Updates</h2>
        <div class="grid gap-4 xl:gap-6 grid-flow-col-dense overflow-x-scroll">
            @foreach ($latest['data'] as $anime)
            <x-card :anime="$anime"></x-card>
            @endforeach
        </div>
    </div>

    <div class="recent-update">
        <h2 class="text-2xl lg:text-3xl font-semibold mb-6">Popular Anime</h2>
        <div class="grid gap-4 xl:gap-6 grid-flow-col-dense overflow-x-scroll">
            {{-- {{dd($popular)}} --}}
            @foreach ($popular['data'] as $anime)
            <div class="card w-36 lg:w-64 mb-4 h-72 lg:h-full">
                <div class="card-image mb-2">
                    <a href="{{ route('anime.show', ['slug' => $anime['slug']]) }}">
                        <img src="{{ $anime['coverImage'] }}" alt="{{ $anime['title']['userPreferred'] }}" class="h-56 lg:h-96 object-cover rounded-lg">
                    </a>
                </div>
                <div class="card-info">
                    <div class="title truncate font-bold">
                        <div class="episode text-sm text-gray-500 font-semibold">Eps {{ $anime['currentEpisode'] }}</div>
                        <a href="{{ route('anime.show', $anime['slug']) }}">{{ $anime['title']['userPreferred'] }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection