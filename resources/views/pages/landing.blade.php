@extends('layouts.landing')

@section('title')
    Tuklas — Ang simula &sdot;
@endsection
    
@section('content')

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