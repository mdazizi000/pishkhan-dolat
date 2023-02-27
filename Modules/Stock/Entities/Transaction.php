<?php

namespace Modules\Stock\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    const TRANSACTION_FAILED = 0 ;
    const TRANSACTION_SUCCESS = 1 ;
    const TRANSACTION_UNPAID = 2 ;

    public function stock_holder()
    {
        return $this->belongsTo(StockHolder::class);
        }

}
