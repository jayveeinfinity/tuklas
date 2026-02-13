<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Inertia\Inertia;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function __construct()
    {
        Inertia::setRootView('layouts/app');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ideas = Idea::orderBy('created_at', 'desc')->get();
        
        return Inertia::render('Ideas/Index', [
            'ideas' => $ideas
        ]);
    }

    /**
     * Create page.
     */
    public function create()
    {
        return Inertia::render('Ideas/Create');
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
        return Inertia::render('Ideas/Show', [
            'idea' => $idea
        ]);
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
