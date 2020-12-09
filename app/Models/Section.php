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
        return $this->hasMany(Section::class, 'parent_id', 'id')->orderBy('order', 'asc');
    }

    public function child()
    {
        if (strpos($_SERVER['REQUEST_URI'], '/am')) {
            $select = ['id', 'name', 'description', 'url', 'type', 'parent_id'];
        }
        else {
            $select = ['id', 'eName as name', 'eDescription as description', 'type', 'eUrl as url', 'parent_id'];
        }
        return $this->hasMany(Section::class, 'parent_id', 'id')->select($select)->orderBy('order', 'asc');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'parent_id', 'id')->orderBy('order', 'asc');
    }

    public function mainFiles()
    {
        if (strpos($_SERVER['REQUEST_URI'], '/am')) {
            $select = ['id', 'file', 'preview', 'parent_id', 'order'];
        }
        else {
            $select = ['id', 'eFile as file', 'ePreview as preview', 'parent_id', 'order'];
        }
        return $this->hasMany(File::class, 'parent_id', 'id')->select($select)->orderBy('order', 'asc');
    }

    public function charts()
    {
        if (strpos($_SERVER['REQUEST_URI'], '/am')) {
            $select = ['id', 'name', 'value', 'parent_id'];
        }
        else {
            $select = ['id', 'eName as name', 'value', 'parent_id'];
        }
        return $this->hasMany(Chart::class, 'parent_id', 'id')->select($select)->orderBy('value', 'desc');
    }
}
