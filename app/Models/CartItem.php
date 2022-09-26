<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];

    /**
     * キャストする必要のある属性
     * sqliteではプリペアドステートメントのエミュレーションが常に有効であるため、キャストしないと値が文字列で返却されてしまう
     * @var array
     */
    protected $casts = [
        'cart_id' => 'integer',
        'product_id' => 'integer',
        'quantity' => 'integer',
    ];

    public function getPrice() {
        $unitPrice = floatval($this->product->unit_price);
        $quantity = intval($this->quantity);
        $price = $unitPrice * $quantity;
        return $price;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
