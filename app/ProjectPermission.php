<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPermission extends Model
{
    protected $table = "project_permissions";
    protected $fillable = [
        'id', 'user_name','project_name'
    ];
    public $timestamps = false;
}
