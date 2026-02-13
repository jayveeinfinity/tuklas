<script setup>
    import AppLayout from '@/Shared/Layouts/App.vue';
    import { useForm } from '@inertiajs/vue3';
    import { ref } from 'vue';
    
    defineOptions({
        layout: AppLayout
    });

    const hasResult = ref(false);

    const form = useForm({
        title: '',
        problem: '',
        users: '',
        importance: '',
        scopes: '',
        limitations: '',
    });

    const form2 = useForm({
        title: '',
        background: '',
        objectives: '',
        scopes: '',
        limitations: ''
    });

    const generateIdea = () => {
        form.post('/ideas/generate', {
            onSuccess: (response) => {
                const data = response.props.ideaDraft;
                form2.title = data.title;
                form2.background = data.background;
                form2.objectives = data.objectives.join('\n');
                form2.scopes = data.scopes.join('\n');
                form2.limitations = data.limitations.join('\n');
                hasResult.value = true;
            }
        });
    }
</script>

<template>
    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white rounded-xl shadow-md space-y-6">
        <!-- Header -->
        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                AI Assistive Idea Creation
            </h2>
            <p class="text-sm text-gray-500">
                Answer the questions below to generate an AI-assisted draft.
            </p>
        </div>

        <!-- Input Fields -->
        <div class="space-y-4">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Proposed Title
                </label>
                <input id="title"
                    v-model="form.title"
                    class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    type="text">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Problem Description
                </label>
                <textarea id="problem"
                        v-model="form.problem"
                        rows="3"
                        class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Affected Users
                </label>
                <textarea id="users"
                        v-model="form.users"
                        rows="2"
                        class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Why does this matter?
                </label>
                <textarea id="importance"
                        v-model="form.importance"
                        rows="2"
                        class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Scope <span class="text-xs text-gray-400">(one per line)</span>
                </label>
                <textarea id="scope"
                        v-model="form.scopes"
                        rows="3"
                        class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Limitations <span class="text-xs text-gray-400">(one per line)</span>
                </label>
                <textarea id="limitations"
                        v-model="form.limitations"
                        rows="3"
                        class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>

        </div>

        <!-- Generate Button -->
        <div>
            <button @click="generateIdea()"
                    class="inline-flex items-center px-5 py-2.5 rounded-lg border bg-gradient-to-r from-cyan-500 to-emerald-500
                        text-white font-semibold shadow hover:opacity-90 transition">
                ✨ Generate AI Draft
            </button>
        </div>

        <!-- Output -->
        <div v-show="hasResult" class="hidden pt-6 border-t border-gray-200 space-y-4">

            <h3 class="text-xl font-semibold text-gray-900">
                AI Generated Draft
            </h3>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Title
                </label>
                <input id="out_title"
                    class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Background
                </label>
                <textarea id="out_background"
                        rows="4"
                        class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Objectives <span class="text-xs text-gray-400">(one per line)</span>
                </label>
                <textarea id="out_objectives"
                        rows="3"
                        class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Scope <span class="text-xs text-gray-400">(one per line)</span>
                </label>
                <textarea id="out_scope"
                        rows="3"
                        class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Limitations <span class="text-xs text-gray-400">(one per line)</span>
                </label>
                <textarea id="out_limitations"
                        rows="3"
                        class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>

            <!-- Save Button -->
            <div class="flex justify-end pt-4">
                <button onclick="saveIdea()"
                        class="px-6 py-2.5 rounded-lg border bg-gray-900 text-white font-semibold
                            hover:bg-gray-800 transition">
                    Save Idea
                </button>
            </div>

        </div>
    </div>
</template>