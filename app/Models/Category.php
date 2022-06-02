<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use \DB;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        'title', 'description'
    ];

    public function news():HasMany
    {
        // прописываем связь
        return $this->hasMany(News::class,'category_id','id');
    }

}
