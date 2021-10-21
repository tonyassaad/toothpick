<?php

/**
 *BaseModel.php
 *tony
 *٥‏/٢‏/٢٠٢٠
 *٤:٤٧ م
 *2020
 *02
 */

namespace App\Models;

use Carbon\Carbon;
use Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseModel extends Model
{
    protected $fillable = ['created_by','updated_by'];

    public function setCreatedByAttribute($value)
    {
        $this->attributes['created_by'] = Auth::id();
    }



    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by =  Auth::id();
        });
        static::updating(function ($model) {
            $model->updated_by =  Auth::id();
        });
    }

    /**
     * Scope to get all rows filtered, sorted and paginated.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $sort
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCollect($query, $sort = 'name')
    {
        $request = request();
        $search = $request->get('search');
        $limit = $request->get('item_per_page');
        if (null != $limit) {
            return $query->paginate($limit);
        }

        return $query->get();
    }

    public function getAllrelations()
    {
        return $this->getRelations();
    }
}
