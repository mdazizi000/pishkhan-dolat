<?php

namespace Modules\Content\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleVideo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
