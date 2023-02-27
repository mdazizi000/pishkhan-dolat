<?php

namespace Modules\Content\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    const STOCKHOLDERS_NEWS='0';
    const STOCKHOLDERS_WARNINGS='1';
    const STOCKHOLDERS_NOTIFICATIONS='2';
    const OFFICES_NOTIFICATIONS='3';
    const OFFICES_NEWS='4';
    const IRAN_NEWS='5';
    const WORLD_NEWS='6';
    const ARTICLES='7';

    public function Videos()
    {
        return $this->hasMany(ArticleVideo::class);
    }
}
