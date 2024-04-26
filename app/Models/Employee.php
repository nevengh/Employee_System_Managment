<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'postion'
    ];

    public function departments(){
        return $this->belongsTo(Department::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class,'employee_project');
    }

    public function notes():MorphMany
    {
        return $this->MorphMany(Note::class,'noteable');
    }


    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst(strtolower($value));
    }

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst(strtolower($value));
    }

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }
}
