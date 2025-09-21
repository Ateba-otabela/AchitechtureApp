<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectImage;
use App\Models\Message;
use App\Models\User;

class Project extends Model
{
     protected $fillable = [
        'title',
        'description',
        'status',
        
    ];

    // Belongs to Admin
    public function admin()
    {
        return $this->belongsTo(User::class);
    }

    // One Project can have many images
    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    // One Project can receive many messages
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
