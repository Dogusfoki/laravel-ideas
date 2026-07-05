<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

// use App\Http\Requests\UptadeIdeaRequest;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ideas = Auth::check()
         ? Auth::user()->ideas
         : collect();

        return view('ideas.index', compact('ideas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIdeaRequest $request)
    {

        Auth::user()->ideas()->create([
        'description' => $request->description,
        'state' => 'pending',
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        Gate::authorize('update', $idea);
        return view('ideas.show', compact('idea'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        Gate::authorize('update', $idea);
        return view('ideas.edit', compact('idea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        Gate::authorize('update', $idea);
        $idea->update([
            'description' => $request->description
        ]);
        return redirect('/ideas/' . $idea->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        Gate::authorize('update', $idea);
        $idea->delete();
        return redirect('/');
    }
}
