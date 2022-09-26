<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'image_path',
        'unit_price',
    ];

    /**
     * キャストする必要のある属性
     * sqliteではプリペアドステートメントのエミュレーションが常に有効であるため、キャストしないと値が文字列で返却されてしまう
     * @var array
     */
    protected $casts = [
        'unit_price' => 'float', // 'decimal:10' does not work
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
