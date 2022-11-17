@extends('layouts.base')

@section('title', $anime['title']['userPreferred'])

@section('content')
<div class="anime-show mt-2">
    <div class="lg:96 h-96 w-full bg-no-repeat bg-cover bg-top" style="background-image: url({{$anime['bannerImage']}})">
        <div class="h-full bg-gradient-to-b from-transparent via-black to-black lg:from-transparent lg:to-black"></div>
    </div>
    
    <div class="lg:px-56 flex flex-col lg:flex-row container items-center lg:items-start mx-auto lg:mt-4">
        <div class="image-cover absolute lg:top-80 top-36 h-75 w-50">
            <img src="{{ $anime['coverImage'] }}" alt="{{ $anime['title']['userPreferred'] }}" class="rounded-md border-2 border-slate-200 drop-shadow-lg">
        </div>
        <div class="anime-desc lg:ml-60 mx-4 my-6">
            <p class="text-4xl font-bold mb-4 text-center lg:text-start">{{ $anime['title']['userPreferred'] }}</p>
            <p class="mb-2 lg:mb-4 font-semibold text-lg text-slate-500 text-center lg:text-start">
                <a class="block lg:inline bg-white p-2 rounded-full lg:mr-1 mb-4 lg:mb-0 text-sm text-black" href="{{ route('anime.watch', ['slug' => $anime['slug'], 'episode' => $anime['episodes'][0]['id']]) }}">Watch Now</a>
                {{ $anime['status'] }} &#9679; {{ count($anime['episodes']) }} Episode(s)
            </p>
            <p>{!! $anime['description'] !!}</p>
        </div>
    </div>

    @if (!empty($anime['relations']))
    <div class="anime-relations lg:mx-56 mx-4 mt-4">
        <p class="text-3xl font-bold mb-4">Related to {{ $anime['title']['userPreferred'] }}</p>

        <div class="grid gap-4 lg:grid-cols-5 grid-cols-2">
            @foreach ($anime['relations'] as $anime)
            <div class="card lg:mb-4">
                <div class="card-image h-fit">
                    <a href="{{ route('anime.show', $anime['anime']['slug']) }}">
                        <img src="{{ $anime['anime']['coverImage'] }}" alt="{{ $anime['anime']['title']['userPreferred'] }}" class="w-full h-64 object-cover rounded-lg">
                    </a>
                </div>
                <div class="card-desc mt-1">
                    <div class="title truncate font-bold">
                        <a href="{{ route('anime.show', $anime['anime']['slug']) }}">{{ $anime['anime']['title']['userPreferred'] }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr class="my-6">
    </div>
    @endif
    
    @if (!empty($characters['data']))    
    <div class="anime-characters lg:mx-56 mx-4">
        {{-- {{dd($characters)}} --}}
        <p class="text-3xl font-bold mb-4">Characters</p>
        <div class="grid gap-4 lg:grid-cols-5 grid-cols-2 overflow-x-scroll h-30">
            @foreach ($characters['data'] as $character)
            <div class="card lg:mb-4">
                <div class="card-image h-fit">
                    <img src="{{ $character['character']['images']['webp']['image_url'] }}" alt="asdasd" class="w-full lg:h-64 object-cover rounded-lg">
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
    @endif

</div>
@endsection