<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type as Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { {
            $projects = Project::all();
            $types = Type::all();
            return view('admin.index', compact('projects', 'types'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        return view('admin.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'bail|required|string|max:255',
                'description' => 'bail|required|string',
                'date' => 'bail|required|date',
                'thumb' => 'bail|required'
            ],
            [
                'title.max' => 'The title must be shorter than 255 characters.',
                'thumb.required' => "The screenshot field is required.",
                'thumb.url' => "The screenshot field must be filled with a 'http://' or 'https://' URL.",
                'thumb.max' => "The screenshot URL must be shorter than 500 characters."
            ]
        );

        $data = $request->all();

        $new_project = new Project();
        if (array_key_exists('thumb', $data)) {
            $image = Storage::putFile('projects_thumbs', $data['thumb']);
            $data['thumb'] = $image;
        };
        $new_project->fill($data);
        $new_project->save();

        return to_route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        return view('admin.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate(
            [
                'title' => 'bail|required|string|max:255',
                'description' => 'bail|required|string',
                'date' => 'bail|required|date',
                'thumb' => 'bail|required',
                'type_id' => 'nullable'
            ],
            [
                'title.max' => 'The title must be shorter than 255 characters.',
                'thumb.required' => "The screenshot field is required.",
                'thumb.url' => "The screenshot field must be filled with a 'http://' or 'https://' URL.",
                'thumb.max' => "The screenshot URL must be shorter than 500 characters."
            ]
        );
        $data = $request->all();
        if (array_key_exists('thumb', $data)) {
            if ($project->thumb) Storage::delete($project->thumb);
            $image = Storage::putFile('projects_thumbs', $data['thumb']);
            $data['thumb'] = $image;
        };
        $project->update($data);
        return to_route('admin.projects.index', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->thumb) Storage::delete($project->thumb);
        $project->delete();
        return to_route('admin.projects.index');
    }
}
