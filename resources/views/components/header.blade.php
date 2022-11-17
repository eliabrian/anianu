<header>
    <nav class="flex items-center justify-center gap-8 py-4 text-4xl font-bold">
        <div>
            <a href="/" class="{{ Route::currentRouteName() === 'explore.index' ? 'active' : 'link' }}">Explore</a>
        </div>
        <div>
            <div id="search-button" class="{{ Route::currentRouteName() === 'anime.search' ? 'active' : 'link' }}">Search</div>
        </div>
    </nav>
    <form class="flex items-center justify-center" method="GET" action="{{ route('anime.search') }}">
        <input type="text" id="search-input" name="q" placeholder="Search" class="bg-gray-600 rounded-lg px-4 py-2 lg:text-2xl font-bold hidden">
        {{-- <button type="submit" class="lg:text-2xl">Submit</button> --}}
    </form>
</header>