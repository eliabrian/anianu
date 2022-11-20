<div class="card w-36 lg:w-64 mb-4 h-72 lg:h-full">
    <div class="card-image mb-2">
        <a href="{{ route('anime.watch', ['slug' => $anime['anime']['slug'], 'episode' => $anime['id']]) }}">
            <img src="{{ $anime['anime']['coverImage'] }}" alt="{{ $anime['anime']['title']['userPreferred'] }}" class="h-56 lg:h-96 object-cover rounded-lg">
        </a>
    </div>
    <div class="card-info">
        <div class="episode text-sm text-gray-500 font-semibold">Eps {{ $anime['number'] }}</div>
        <div class="title truncate font-bold">
            <a href="{{ route('anime.show', $anime['anime']['slug']) }}">{{ $anime['anime']['title']['userPreferred'] }}</a>
        </div>
    </div>
</div>