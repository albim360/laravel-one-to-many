<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $deletedProjects = Project::onlyTrashed()->get();
        return view('projects.index', compact('projects', 'deletedProjects'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $project = new Project();
        $project->customer = $request->customer;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->url = $request->url;
        $project->status = $request->status;
        $project->slug = Str::slug($request->title);
        $project->save();

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
{
    $validated = $request->validated();

    $projectData = [
        'title' => $validated['title'],
        'description' => $validated['description'],
        'slug' => Str::slug($validated['title']),
        'customer' => $validated['customer'],
        'url' => $validated['url'],
        'status' => $validated['status'],
    ];

    if (isset($validated['url'])) {
        $projectData['url'] = $validated['url'];
    }

    $project->update($projectData);

    return redirect()->route('projects.show', $project);
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Progetto eliminato con successo!');
    }
    
    public function deleted()
    {
        $deletedProjects = Project::onlyTrashed()->get();
        return view('deleted_projects.index')->with('deletedProjects', $deletedProjects);
    }
    
    public function restore($id)
{
    $project = Project::withTrashed()->findOrFail($id);
    $project->restore();

    return redirect()->route('deleted-projects.index')->with('success', 'Progetto ripristinato con successo!');
}

public function forceDelete(Project $project)
{
    $project->forceDelete();

    return redirect()->route('deleted-projects.index')
    ->with('success', 'Progetto eliminato definitivamente.');

}



}
