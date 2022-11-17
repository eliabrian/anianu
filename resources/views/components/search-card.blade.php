<div class="card lg:mb-4">
    <div class="card-image h-fit">
        <a href="{{ route('anime.show', ['slug' => $anime['slug']]) }}">
            <img src="{{ $anime['coverImage'] }}" alt="{{ $anime['title']['userPreferred'] }}" class="rounded-md w-full lg:h-80 h-96 object-cover">
        </a>
    </div>
    <div class="card-desc mt-1">
        {{-- <div class="episode text-sm text-gray-500 font-semibold">Eps {{ $anime['number'] }}</div> --}}
        <div class="title truncate font-bold">
            <a href="{{ route('anime.show', $anime['slug']) }}">{{ $anime['title']['userPreferred'] }}</a>
        </div>
    </div>
</div>