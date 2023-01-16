<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "projects";
    protected $fillable = [
        'project_id', 'project_name'
    ];
    public $timestamps = false;

}
