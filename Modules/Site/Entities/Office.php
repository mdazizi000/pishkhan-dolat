<?php

namespace Modules\Site\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Office extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends=['office_permit_path','national_card_path','national_card_back_path','bank_account_path','commitment_letter_path'];
    const  PENDING='2';
    const  CONFIRMED='1';
    CONST  REJECTED='0';
    public function getOfficePermitPathAttribute()
    {
        return Storage::url($this->office_permit);
    }

    public function getNationalCardPathAttribute()
    {
        return Storage::url($this->national_card);
    }

    public function getNationalCardBackPathAttribute()
    {
        return Storage::url($this->national_card_back);
    }

    public function getBankAccountPathAttribute()
    {
        return Storage::url($this->bank_account);
    }

    public function getCommitmentLetterPathAttribute()
    {
        return Storage::url($this->commitment_letter);
    }

    public function users()
    {
        return $this->hasMany(OfficeUser::class);
    }
}

