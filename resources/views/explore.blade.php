@extends('layouts.base')

@section('title', 'Explore')

@section('content')
{{-- {{dd($popular)}} --}}
<div class="explore px-10 my-6">
   <div class="popular-anime mb-6">
        <div id="controls-carousel" class="relative" data-carousel="carousel">
            <!-- Carousel wrapper -->
            <div class="relative h-80 lg:h-30 overflow-hidden rounded-lg md:h-30">
                @foreach ($popular['data'] as $anime)
                <div id="carousel-item-{{$loop->index}}" class="hidden duration-700 ease-in-out" data-carousel-item="@if($loop->first) active @endif">
                    <span class="absolute text-lg lg:text-4xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 top-1/2 lg:left-56 left-40 z-50 w-72">
                        {{ $anime['title']['userPreferred'] }}
                        <p class="text-sm lg:text-md lg:line-clamp-3 line-clamp-2 font-light lg:mt-4 lg:w-96">{!!$anime['description'] !!}</p>
                        <a class="block lg:inline bg-white p-2 rounded-full lg:mr-1 text-sm text-black w-fit mt-3 lg:mt-4" href="{{ route('anime.show', ['slug' => $anime['slug']]) }}">Watch Now</a>
                    </span>
                    <div class="absolute h-full w-full bg-no-repeat bg-cover bg-top " style="background-image: url({{$anime['bannerImage']}})">
                        <div class="h-full bg-neutral-900/75"></div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                @for ($i = 0; $i < count($popular['data']); $i++)
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                @endfor
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
   </div>
    
    <div class="recent-update mb-6">
        <h2 class="text-2xl lg:text-3xl font-semibold mb-6">Recent Updates</h2>
        <div class="grid gap-4 xl:gap-6 grid-flow-col-dense overflow-x-scroll">
            @foreach ($latest['data'] as $anime)
            <x-card :anime="$anime"></x-card>
            @endforeach
        </div>
    </div>
</div>
@endsection