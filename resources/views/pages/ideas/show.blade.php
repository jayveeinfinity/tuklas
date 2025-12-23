@extends('layouts.app')

@section('title')
    {{ $idea->title }} &sdot;
@endsection

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
    {{-- Title --}}
    <h1 class="text-3xl font-bold">{{ $idea->title }}</h1>
    @if($idea->ai_assisted)
        <span class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 inset-ring inset-ring-indigo-700/10">
            AI Assisted
        </span>
    @endif

    {{-- Background --}}
    <div class=" mt-4 mb-6">
        <h2 class="text-xl font-semibold mb-2">Background</h2>
        <p class="text-gray-700">{{ $idea->background }}</p>
    </div>

    {{-- Objectives --}}
    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Objectives</h2>
        @if(!empty($idea->objectives))
            <ul class="list-disc list-inside text-gray-700">
                @foreach($idea->objectives as $obj)
                    <li>{{ $obj }}</li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No objectives provided.</p>
        @endif
    </div>

    {{-- Scope --}}
    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Scope</h2>
        @if(!empty($idea->scope))
            <ul class="list-disc list-inside text-gray-700">
                @foreach($idea->scope as $s)
                    <li>{{ $s }}</li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No scope provided.</p>
        @endif
    </div>

    {{-- Limitations --}}
    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Limitations</h2>
        @if(!empty($idea->limitations))
            <ul class="list-disc list-inside text-gray-700">
                @foreach($idea->limitations as $lim)
                    <li>{{ $lim }}</li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No limitations provided.</p>
        @endif
    </div>
</div>
@endsection