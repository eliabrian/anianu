@extends('layouts.base')

@section('title', 'Search Result')

@section('content')
<div class="explore px-10 my-6">
    <h2 class="text-2xl font-semibold mb-6">Search Results</h2>
    <div class="grid gap-4 lg:grid-cols-6 grid-cols-2">
        @foreach ($results['data'] as $anime)
            <x-search-card :anime="$anime"></x-card>
        @endforeach
    </div>
</div>
@endsection