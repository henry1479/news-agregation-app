<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Source extends Model
{
    use HasFactory;

    protected $table = "sources";

    protected $fillable = [
        'source_name', 'source_url'
    ];

    public function news():HasMany
    {
        // прописываем связь
        return $this->hasMany(News::class,'source_id','id');
    }

}
