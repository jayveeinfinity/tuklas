<script setup>

</script>

<template>
    <header class="w-full bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            
            <!-- Logo -->
            <a :href="route('home')">
                <div class="flex flex-col leading-tight">
                    <span class="text-3xl font-extrabold text-gray-900 tracking-tight">
                        Tuklas
                    </span>
                    <span class="text-sm font-medium text-gray-500 tracking-wide italic">
                        Ang Panimulang Bahagi
                    </span> 
                </div>
            </a>

            <div class="flex flex-row gap-5 items-center">
                <ul class="flex flex-row gap-5">
                    <li class="text-gray-500"><a :href="route('ideas.index')">Explore</a></li>
                    <li class="text-gray-500"><a href="#">Profile</a></li>
                </ul>
                <a class="py-2 px-3 border rounded-lg bg-black text-white" :href="route('ideas.create')">
                    Share you idea
                </a>
            </div>
        </div>
    </header>
</template>