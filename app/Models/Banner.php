<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as BaseModel;
use App\Models\Model;

class Banner extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'banner_id','id');
    }

}
