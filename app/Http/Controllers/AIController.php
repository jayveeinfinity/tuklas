<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class AIController extends Controller
{
    public function generateIdea(Request $request)
    {
        $prompt = $this->buildPrompt($request);

        $response = Http::post(
            'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-lite:generateContent?key=' . env('GOOGLE_AI_API_KEY'),
            [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]
        );

        $json = $response->json();

        // 🔐 Always log raw response for debugging
        Log::info('Gemini raw response', $json ?? []);

        $text = $json['candidates'][0]['content']['parts'][0]['text'] ?? '';

        // Remove Markdown code fences if they exist
        $text = preg_replace('/^```json\s*|\s*```$/', '', trim($text));

        // Decode JSON safely
        $aiOutput = json_decode($text, true);

        if (!$aiOutput) {
            return response()->json([
                'error' => 'AI returned invalid JSON',
                'raw' => $text
            ], 500);
        }

        // Return structured JSON directly
        return response()->json($aiOutput);
    }

    private function buildPrompt(Request $r)
    {
        $scope = is_array($r->scope) ? implode(', ', $r->scope) : $r->scope;
        $limitations = is_array($r->limitations) ? implode(', ', $r->limitations) : $r->limitations;

        return <<<PROMPT
            You are assisting a university student in drafting a research or capstone idea.

            Rules:
            - Academic tone
            - Original content
            - Do NOT include methodology, results, or citations
            - Keep content concise, high-level, and suitable for a project idea repository
            - Output MUST be valid JSON only
            - English only

            Required JSON format:
            {
            "title": "string",
            "background": "string",
            "objectives": ["string", "string", "..."],
            "scope": ["string", "string", "..."],
            "limitations": ["string", "string", "..."]
            }

            Student Input:
            - Proposed Title: {$r->title}
            - Problem Description: {$r->problem}
            - Affected Users: {$r->users}
            - Importance of the Problem: {$r->importance}
            - Scope Ideas: {$scope}
            - Known Limitations: {$limitations}

            Generate the JSON output ONLY. Do NOT include any extra text, headings, or explanations.
            PROMPT;
    }
}
