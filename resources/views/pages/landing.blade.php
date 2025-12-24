@extends('layouts.landing')

@section('title')
    Tuklas — Ang simula &sdot;
@endsection

@section('content')
<div class="relative w-full min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/backgrounds/landing.png') }}');">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div>
    
    <div class="absolute inset-0 flex justify-center items-end">
        <div class="grid w-full">
            <div class="grid-lines"></div>
            <div class="grid-fade"></div>
        </div>
    </div>

    <!-- Content -->
    <div class="relative z-10 min-h-screen">
        <header class="w-full">
            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
                
                <!-- Logo -->
                <a href="{{ route('home') }}">
                    <div class="flex flex-col leading-tight">
                        <span class="text-3xl font-extrabold text-white tracking-tight">
                            Tuklas
                        </span>
                        <span class="text-sm font-medium text-white tracking-wide italic">
                            Ang Panimulang Bahagi
                        </span> 
                    </div>
                </a>

                <div class="flex flex-row gap-5 items-center">
                    <ul class="flex flex-row gap-5">
                        <li class="text-white"><a href="{{ route('ideas.index') }}">Explore</a></li>
                        <li class="text-white"><a href="#">About</a></li>
                    </ul>
                    <a class="pb-2 pt-1 px-4 border text-white rounded-lg" href="{{ route('ideas.create') }}">
                        Sign in
                    </a>
                </div>
            </div>
        </header>
        <div class="max-w-7xl h-[calc(100vh-218px)] mx-auto p-6 rounded-lg mt-6 flex flex-col justify-center align-center">
            <h1 class="text-7xl font-bold text-white">
                Start Your Research<br>with <span class="highlight">Confidence</span>
            </h1>
            <p class="text-white/80  mt-2">
                Tuklas: ang panimulang bahagi — an exclusive platform for students overcome the hardest part of research—starting.<br>
                Discover ideas, refine concepts, and build your academic journey from the ground up.
            </p>
            <div class="mt-8 flex justify-start gap-4">
                <a href="/register" class="px-6 py-3 border border-gray-300 text-white rounded-lg text-sm font-medium">
                    Get Started
                </a>
                <a href="/ideas" class="px-6 py-3 border border-gray-300 text-white rounded-lg text-sm font-medium">
                    Explore Ideas
                </a>
            </div>
        </div>
        <footer class="w-full">
            <div class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
                <span class="text-gray-400 leading-tight">&copy; 2025 — Developed By John Vincent Bonza</span>
            </div>
        </footer>
    </div>
</div>
<style lang="scss">
    :root {
        --grid-height: 1300px;
        --body-bg-rgb: 14, 20, 22;
        --grid-color-rgb: 255, 255, 255;
    }
    .grid {
        position: relative;
        width: 100%;
        height: var(--grid-height);
        overflow: hidden;
        perspective: calc(var(--grid-height) * 0.75);
    }

    .grid-fade {
        position: absolute;
        inset: 0;
        z-index: 2;
        background: radial-gradient(
            ellipse at center,
            rgba(var(--body-bg-rgb), 0) 0%,
            rgba(var(--body-bg-rgb), 0.85) 80%
        );
    }
    .grid-lines {
        position: absolute;
        inset: 0;
        z-index: 1;
        height: 200%;
        background-image:
            linear-gradient(rgba(var(--grid-color-rgb), 0.6) 2px, transparent 0),
            linear-gradient(90deg, rgba(var(--grid-color-rgb), 0.6) 2px, transparent 0),
            linear-gradient(rgba(var(--grid-color-rgb), 0.3) 1px, transparent 0),
            linear-gradient(90deg, rgba(var(--grid-color-rgb), 0.3) 1px, transparent 0);
        background-size:
            calc(var(--grid-height) / 3) calc(var(--grid-height) / 4),
            calc(var(--grid-height) / 3) calc(var(--grid-height) / 4),
            calc(var(--grid-height) / 15) calc(var(--grid-height) / 20),
            calc(var(--grid-height) / 15) calc(var(--grid-height) / 20);
        background-repeat: repeat;
        background-position: center;
        transform-origin: 50% 0;
        animation: play 45s linear infinite;
    }

    @keyframes play {
        from {
            transform: rotateX(45deg) translateY(-50%);
        }
        to {
            transform: rotateX(45deg) translateY(0);
        }
    }

    h1 .highlight {
        background: linear-gradient(135deg, #e52d27 0%, #ff00ff 35%, #ffe259 65%, #ffe259 100%);
        background-size: 200% 200%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradientShift 3s ease infinite;
        filter: drop-shadow(0 0 30px rgba(79, 143, 232, 0.6));
    }

    h1 .text-outline {
        -webkit-text-stroke-width: 2px;
        -webkit-text-stroke-color: #4F8FE8;
        color: transparent;
    }
    h1 .neon-text {
        -webkit-text-stroke-width: 2px;
        -webkit-text-stroke-color: white;
        color: transparent;
        text-shadow: 0 0 5px #ff00ff, 0 0 10px #ff00ff, 0 0 20px #ff00ff, 0 0 40px #00ffff, 0 0 80px #00ffff;
    }
</style>
@endsection