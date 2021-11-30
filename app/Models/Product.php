<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as BaseModel;
use App\Models\Model;

class Product extends Model
{
    use HasFactory;

    public function banner()
    {
        return $this->belongsTo('App\Models\Banner', 'banner_id', 'id');
    }

}
