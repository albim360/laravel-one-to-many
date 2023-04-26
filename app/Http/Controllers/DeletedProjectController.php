<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Controllers\ProjectController;


class DeletedProjectController extends Controller
{
    public function index()
    {
        $deletedProjects = Project::onlyTrashed()->get();
        return view('deleted_projects.index')->with('deletedProjects', $deletedProjects);
    }

    public function restore($id)
    {
        $project = Project::withTrashed()->find($id);
        $project->restore();
        return redirect()->route('deleted-projects.index')->with('success', 'Progetto ripristinato.');
    }
    public function delete($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Progetto eliminato.');
    }
    
    
    
    
    

}
