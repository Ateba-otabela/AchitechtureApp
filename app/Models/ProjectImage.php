<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class ProjectImage extends Model
{
    protected $fillable = [
        'project_id',
        'image_path',
    ];

    // Belongs to a Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
