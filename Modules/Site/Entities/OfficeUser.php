<?php

namespace Modules\Site\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class OfficeUser extends Authenticatable
{
    use HasFactory;

    protected $guarded=['id'];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
