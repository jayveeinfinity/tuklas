@extends('layouts.app')

@section('title')
    AI Assistive Idea Wizard  &sdot;
@endsection

@section('content')
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
                   class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                   type="text">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Problem Description
            </label>
            <textarea id="problem"
                      rows="3"
                      class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Affected Users
            </label>
            <textarea id="users"
                      rows="2"
                      class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Why does this matter?
            </label>
            <textarea id="importance"
                      rows="2"
                      class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Scope <span class="text-xs text-gray-400">(one per line)</span>
            </label>
            <textarea id="scope"
                      rows="3"
                      class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Limitations <span class="text-xs text-gray-400">(one per line)</span>
            </label>
            <textarea id="limitations"
                      rows="3"
                      class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
        </div>

    </div>

    <!-- Generate Button -->
    <div>
        <button onclick="generateIdea()"
                class="inline-flex items-center px-5 py-2.5 rounded-lg border bg-gradient-to-r from-cyan-500 to-emerald-500
                       text-white font-semibold shadow hover:opacity-90 transition">
            ✨ Generate AI Draft
        </button>
    </div>

    <!-- Output -->
    <div id="result" class="hidden pt-6 border-t border-gray-200 space-y-4">

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
@endsection

@push('scripts')
<script>
    async function generateIdea() {
        const payload = {
            title: document.getElementById('title').value,
            problem: document.getElementById('problem').value,
            users: document.getElementById('users').value,
            importance: document.getElementById('importance').value,
            scope: document.getElementById('scope').value.split('\n'),
            limitations: document.getElementById('limitations').value.split('\n')
        };

        const res = await fetch('/api/ai/generate-idea', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        const data = await res.json();

        document.getElementById('result').style.display = 'block';
        document.getElementById('out_title').value = data.title;
        document.getElementById('out_background').value = data.background;
        document.getElementById('out_objectives').value = data.objectives.join('\n');
        document.getElementById('out_scope').value = data.scope.join('\n');
        document.getElementById('out_limitations').value = data.limitations.join('\n');
    }
    
    async function saveIdea() {
        const payload = {
            title: document.getElementById('out_title').value,
            background: document.getElementById('out_background').value,
            objectives: document.getElementById('out_objectives').value
                .split('\n').map(s => s.trim()).filter(Boolean),
            scope: document.getElementById('out_scope').value
                .split('\n').map(s => s.trim()).filter(Boolean),
            limitations: document.getElementById('out_limitations').value
                .split('\n').map(s => s.trim()).filter(Boolean),
            ai_assisted: true,
        };

        const res = await fetch('/api/ideas/save', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                // 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(payload)
        });

        const data = await res.json();
        const id = data.idea?.id;

        if (!id) {
            alert('Failed to save idea');
            console.error(data);
            return;
        }

        // Redirect to idea page
        window.location.href = `/ideas/${id}`;
    }
</script>
@endpush