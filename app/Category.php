<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'CategoryId';
    protected $fillable = [
        'CategoryName',
        'Description',
    ];
    public function products()
    {
        return $this->hasMany('App\Product', 'CategoryId');
    }
    public $timestamps = false;
}
