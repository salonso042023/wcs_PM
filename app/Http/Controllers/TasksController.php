<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Inertia\Response;

use App\Models\Tasks;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : Response
    {
        return Inertia::render('Tasks/Index', [
            //
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'task_title' => 'required|string|max:255',
            'project_id' => 'required|string|max:255',
        ]);

        $request->user()->tasks()->create($validated);

        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $tasks)
    {
        //
    }
}
