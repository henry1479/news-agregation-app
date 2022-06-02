<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DB;

class News extends Model
{
    use HasFactory;


    protected $table = "news";
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'status',
        'description',
        'only_admin'
    ];
    // указываем тип данных
    protected $casts =[
        'only_admin' => 'boolean'
    ];
    //прописываем обратную связь
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    
}



