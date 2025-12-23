@extends('layouts.app')

@section('title')
    Ideas &sdot;
@endsection

@section('content')

<div class="max-w-7xl mx-auto px-6 py-8">

    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Explore Ideas</h1>
        <p class="text-sm text-gray-500">
            Browse thesis, research, and capstone ideas shared by the community.
        </p>
    </div>

    <!-- Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        @forelse($ideas as $idea)
        <!-- Idea Card -->
        <a href="{{ route('ideas.show', ['idea' => $idea]) }}"
           class="block p-5 bg-white border border-gray-200 rounded-xl shadow-sm
                  hover:shadow-md transition">

            <!-- Title + Badge -->
            <div class="flex items-start justify-between gap-4">
                <h2 class="text-lg font-semibold text-gray-900 leading-snug">
                    {{ $idea->title }}
                </h2>

                <!-- AI Badge -->
                @if($idea->ai_assisted)
                    <span class="inline-flex items-center p-0.5 text-xs font-semibold rounded-full
                                border border-transparent
                                bg-gradient-to-r from-cyan-400 via-emerald-400 to-yellow-400
                                bg-[origin-border] bg-clip-border">
                        <span class="bg-white px-2 py-0.5 rounded-full text-gray-800 truncate">
                            AI Assisted
                        </span>
                    </span>
                @endif
            </div>

            <!-- Excerpt -->
            <p class="mt-3 text-sm text-gray-600 line-clamp-3">
                {{ $idea->background }}
            </p>

            <!-- Meta -->
            <div class="mt-4 flex items-center justify-between text-xs text-gray-500">
                <span>By Juan Dela Cruz</span>
                <span>Capstone Project</span>
            </div>
        </a>
        @empty
        @endforelse

    </div>
</div>
@endsection