<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;

class ProjectController extends Controller

{

    public function show(Request $request){
        
    }

    public function store(Request $request)
  
            {
                
                $project = $request->validate([
                    'title'       => 'required|string|max:255',
                    'description' => 'nullable|string',
                    'images'      => 'required|array|max:12',
                    'images.*'    => 'image|mimes:jpg,jpeg,png|max:2048',
                ]);

                
                $project = Project::create([
                    'title' => $request->title,
                    'description' => $request->description,
                ]);


                // Save images
                foreach ($request->file('images') as $image) {
                    $path = $image->store('projects', 'public');
                    ProjectImage::create([
                        'project_id' => $project->id,
                        'image_path' => $path,
                    ]);
                }

                return redirect()->back()->with('success', 'Project created successfully!');
            }

}
