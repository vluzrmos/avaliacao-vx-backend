<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Sale extends Model
{
    use SoftDeletes;
       
    protected $fillable = [
        'purchase_at' ,
        'amount',
        'delivery_days',
    ];

    protected $dates = [
        'purchase_at',
    ];

    public function products()
    {
        return $this->BelongsToMany(Product::class, 'sale_product')->withPivot('price', 'quantity', 'amount')->withTimestamps();
    }

    public function setPurchaseAtAttribute($value)
    {
        /*
         * This will allow purchase_at to accept all kinds of Carbon::parse formats.
         */
        $this->attributes['purchase_at'] = $value ? Carbon::parse($value) : null;
    }
}
