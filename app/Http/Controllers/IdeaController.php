<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ideas = Idea::all();

        return view('pages.ideas.index', compact('ideas'));
    }

    /**
     * Create page.
     */
    public function create()
    {
        return view('pages.ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'background' => 'required|string',
            'objectives' => 'required|array',
            'scope' => 'required|array',
            'limitations' => 'required|array',
            'parent_id' => 'nullable|exists:ideas,id',
        ]);

        $idea = Idea::create([
            'parent_id' => $request->parent_id,
            'version' => 1, // default 1 for new or fork
            'title' => $request->title,
            'background' => $request->background,
            'objectives' => $request->objectives,
            'scope' => $request->scope,
            'limitations' => $request->limitations,
            'ai_assisted' => $request->ai_assisted ?? false,
        ]);

        return response()->json([
            'success' => true,
            'idea' => $idea
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('pages.ideas.show', compact('idea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
