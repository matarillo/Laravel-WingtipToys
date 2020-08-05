<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'ProductId';
    protected $fillable = [
        'ProductName',
        'Description',
        'ImagePath',
        'UnitPrice'
    ];
    public function category()
    {
        return $this->belongsTo('App\Category', 'CategoryId');
    }
    public $timestamps = false;
}
