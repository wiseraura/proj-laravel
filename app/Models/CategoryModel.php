<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $timestamp = false;
    const CREATED_AT   = 'created';
    const UPDATED_AT   = 'modified';

    protected $crudNotAccepted     = [
        '_token',
        'thumb_current',
    ];

    public function articles() {
        return $this->hasMany(ArticleModel::class, 'category_id', 'id');
    }
}
