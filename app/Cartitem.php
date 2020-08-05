<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartitem extends Model
{
    protected $primaryKey = 'ItemId';
    public $incrementing = false;
    protected $fillable = [
        'CartId',
        'Quantity',
        'DateCreated'
    ];
    protected $dates = ['DateCreated'];
    public function product()
    {
        return $this->belongsTo('App\Product', 'ProductId');
    }
    public function getPrice() {
        $unitPrice = floatval($this->product->UnitPrice);
        $price = $unitPrice * $this->Quantity;
        return $price;
    }
    public $timestamps = false;
}
