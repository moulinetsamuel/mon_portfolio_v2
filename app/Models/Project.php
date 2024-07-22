<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'url', 'github_url'];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function stacks()
    {
        return $this->belongsToMany(Stack::class, 'project_stack');
    }
}
