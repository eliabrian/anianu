@extends('layouts.base')

@section('title', 'Explore')

@section('content')
<div class="explore px-10 my-6">
    <div class="seasonal mb-8">
        <div class="card-list-header">
            <div class="flex justify-between items-center lg:mb-6">
                <div class="card-list-header-title">
                    <h2 class="text-2xl lg:text-3xl font-semibold">Seasonal Anime</h2>
                </div>
                <div class="card-list-header-devider grow hidden lg:block">
                    <hr class="mx-8 border-1 bg-white">
                </div>
                <div class="card-list-header-all">
                    <a href="#">View All</a>
                </div>
            </div>
        </div>
        <hr class="mb-4 mt-2 border-1 bg-white lg:hidden">
        <div class="card-list-body grid gap-5 lg:grid-cols-5 md:grid-cols-3 grid-cols-2">
            @foreach ($now as $anime)
            <x-card :anime="$anime"></x-card>
            @endforeach
        </div>
    </div>

    <div class="top">
        <div class="card-list-header">
            <div class="flex justify-between items-center lg:mb-6">
                <div class="card-list-header-title">
                    <h2 class="text-2xl lg:text-3xl font-semibold">Top Airing Anime</h2>
                </div>
                <div class="card-list-header-devider grow hidden lg:block">
                    <hr class="mx-8 border-1 bg-white">
                </div>
                <div class="card-list-header-all">
                    <a href="#">View All</a>
                </div>
            </div>
        </div>
        <hr class="mb-4 mt-2 border-1 bg-white lg:hidden">
        <div class="card-list-body grid gap-5 lg:grid-cols-5 md:grid-cols-3 grid-cols-2">
            @foreach ($top as $anime)
            <x-card :anime="$anime"></x-card>
            @endforeach
        </div>
    </div>
</div>
@endsection