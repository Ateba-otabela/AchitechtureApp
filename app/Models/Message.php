<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Message extends Model
{
     protected $fillable = [
        'project_id',
        'user_name',
        'user_email',
        'user_whatsapp',
        'message',
        'contact_via',
    ];

    // Belongs to a Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
