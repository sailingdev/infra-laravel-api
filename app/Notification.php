<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notifications";
    protected $fillable = [
        'id', 'sender_id', 'sender_name', 'project_id', 'project_name', 'option_id', 'option_name', 'receivers', 'file_url','uploaded_at'
    ];
    public $timestamps = false;
}
