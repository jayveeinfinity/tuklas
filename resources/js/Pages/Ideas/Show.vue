<script setup>
    import AppLayout from '@/Shared/Layouts/App.vue';
    
    defineOptions({
        layout: AppLayout
    });

    defineProps({
        idea: Object
    });
</script>

<template>
    <Head :title="idea.title" />
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <h1 class="text-3xl font-bold">{{ idea.title }}</h1>
        <span v-if="idea.ai_assisted" class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 inset-ring inset-ring-indigo-700/10">
            AI Assisted
        </span>

        <div class=" mt-4 mb-6">
            <h2 class="text-xl font-semibold mb-2">Background</h2>
            <p class="text-gray-700">{{ idea.background }}</p>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Objectives</h2>
            
            <ul v-if="idea?.objectives" class="list-disc list-inside text-gray-700">
                <li v-for="objective in idea.objectives" :key="objective">{{ objective }}</li>
            </ul>
            <p v-else class="text-gray-500">No objectives provided.</p>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Scope</h2>
            <ul  v-if="idea?.scopes" class="list-disc list-inside text-gray-700">
                <li v-for="scope in idea.scopes" :key="scope">{{ scope }}</li>
            </ul>
            <p v-else class="text-gray-500">No scope provided.</p>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Limitations</h2>
            <ul v-if="idea?.limitations" class="list-disc list-inside text-gray-700">
                <li v-for="limitation in idea.limitations" :key="limitation">{{ limitation }}</li>
            </ul>
            <p v-else class="text-gray-500">No limitations provided.</p>
        </div>
    </div>
</template>