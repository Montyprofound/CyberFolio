<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'screenshot' => 'nullable|image|max:2048',
            'tools_used' => 'required|string',
            'link' => 'nullable|url'
        ]);

        $data = $request->all();
        $data['tools_used'] = explode(',', $request->tools_used);
        
        if ($request->hasFile('screenshot')) {
            $data['screenshot'] = $request->file('screenshot')->store('screenshots', 'public');
        }

        Project::create($data);
        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'screenshot' => 'nullable|image|max:2048',
            'tools_used' => 'required|string',
            'link' => 'nullable|url'
        ]);

        $data = $request->all();
        $data['tools_used'] = explode(',', $request->tools_used);
        
        if ($request->hasFile('screenshot')) {
            if ($project->screenshot) {
                Storage::disk('public')->delete($project->screenshot);
            }
            $data['screenshot'] = $request->file('screenshot')->store('screenshots', 'public');
        }

        $project->update($data);
        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        if ($project->screenshot) {
            Storage::disk('public')->delete($project->screenshot);
        }
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
