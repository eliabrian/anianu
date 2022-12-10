<div class="card transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-105 duration-125">
    <div class="card-image">
        <a href="{{ route('anime.show', ['id' => $anime['mal_id']]) }}">
            <img src="{{ $anime['images']['jpg']['large_image_url'] }}" alt="{{ $anime['title'] }}" class="object-cover rounded-lg 2xl:h-128 lg:h-96 md:h-96 h-60 w-full">
        </a>
    </div>
    <div class="card-info mt-1">
        <div class="episode text-sm text-gray-500 font-semibold flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3 mr-1">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
            </svg>                                                  
            {{ $anime['score'] }}
        </div>
        <div class="title truncate font-bold">
            <a href="{{ route('anime.show', ['id' => $anime['mal_id']]) }}">{{ $anime['title'] }}</a>
        </div>
    </div>
</div>