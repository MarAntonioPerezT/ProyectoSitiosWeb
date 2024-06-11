<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(CategoriesModel::class, 'categories_id');
    }

    public function labels()
    {
        return $this->belongsTo(LabelsModel::class, 'label_id');
    }

    public function authors()
    {
        return $this->belongsTo(AuthorsModel::class, 'author_id');
    }
}
