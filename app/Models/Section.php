<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function parent()
    {
        return $this->belongsTo(Section::class, 'parent_id', 'id');
    }

    public function types()
    {
        return $this->hasOne(Type::class, 'id', 'type');
    }

    public function children()
    {
//        if (strpos($_SERVER['REQUEST_URI'], 'am')) {
//            $select = ['id', 'name', 'description', 'image', 'type', 'parent_id'];
//        }
//        else {
//            $select = ['id', 'oln as name', 'old as description', 'type', 'image', 'parent_id'];
//        }
        return $this->hasMany(Section::class, 'parent_id', 'id')->orderBy('order', 'asc');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'parent_id', 'id')->orderBy('order', 'asc');
    }
}
