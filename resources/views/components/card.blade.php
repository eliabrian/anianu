<div class="card lg:mb-4">
    <div class="card-image h-fit">
        <a href="{{ route('anime.watch', ['slug' => $anime['anime']['slug'], 'episode' => $anime['id']]) }}">
            <img src="{{ $anime['anime']['coverImage'] }}" alt="{{ $anime['anime']['title']['userPreferred'] }}" class="rounded-md w-full xl:h-96 lg:h-80 md:h-96 h-64 object-cover">
        </a>
    </div>
    <div class="card-desc mt-1">
        <div class="episode text-sm text-gray-500 font-semibold">Eps {{ $anime['number'] }}</div>
        <div class="title truncate font-bold">
            <a href="{{ route('anime.show', $anime['anime']['slug']) }}">{{ $anime['anime']['title']['userPreferred'] }}</a>
        </div>
    </div>
</div>