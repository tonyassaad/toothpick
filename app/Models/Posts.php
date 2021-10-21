<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModel;
use App\User;

class Posts extends  BaseModel
{
    use SoftDeletes;

    use HasFactory;

    protected $fillable = ['title', 'sub_title', 'slug', 'description', 'created_by', 'updated_by'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
