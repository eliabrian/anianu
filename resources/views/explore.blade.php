@extends('layouts.base')

@section('title', 'Explore')

@section('content')
<div class="explore px-10 my-6">
    <h2 class="text-2xl font-semibold mb-6">Recent Updates</h2>
    <div class="grid gap-4 lg:grid-cols-6 grid-cols-1">
        @foreach ($latest['data'] as $anime)
            <x-card :anime="$anime"></x-card>
        @endforeach
    </div>
</div>
@endsection