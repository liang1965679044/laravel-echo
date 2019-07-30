<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $guarded=[];
    //
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function discussions()
    {
        return $this->hasMany(Discussion::class)->with('user');
    }
}
