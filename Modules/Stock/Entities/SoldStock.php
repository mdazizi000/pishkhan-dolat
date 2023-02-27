<?php

namespace Modules\Stock\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SoldStock extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function holder()
    {
        return $this->belongsTo(StockHolder::class,'stock_holder_id');
    }

    public function subStocks()
    {
        return $this->hasMany(SoldStock::class,'main_id');
    }
}
