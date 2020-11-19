<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function parent()
    {
        return $this->belongsTo(Section::class, 'parent_id', 'id');
    }
}
