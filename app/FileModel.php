<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileModel extends Model
{
    protected $table = "files";
    protected $fillable = [
        'option_id', 'project_id', 'id', 'file_name', 'file_url', 'uploaded_at'
    ];
    public $timestamps = false;
    protected $dates = ['uploaded_at'];

}
