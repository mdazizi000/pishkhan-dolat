<?php

namespace Modules\Stock\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class StockHolder extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    public function stocks()
    {
        return $this->hasMany(SoldStock::class);
    }
}
