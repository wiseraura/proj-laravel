<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    protected $table = 'article';
    protected $timestamp = false;
    const CREATED_AT   = 'created';
    const UPDATED_AT   = 'modified';

    protected $crudNotAccepted     = [
        '_token',
        'thumb_current',
    ];

    public function category() {
        return $this->belongsTo(CategoryModel::class);
    }
}
