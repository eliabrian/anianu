@extends('layouts.base')

@section('title', 'Search Result')

@section('content')
<div class="explore px-10 my-6">
    <h2 class="text-2xl font-semibold mb-6">Search Results</h2>
    <div class="card-list-body grid gap-5 lg:grid-cols-5 md:grid-cols-3 grid-cols-2">
        @foreach ($animes as $anime)
        <x-card :anime="$anime"></x-card>
        @endforeach
    </div>
</div>
@endsection