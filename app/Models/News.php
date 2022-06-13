<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'slug',
        'status',
        'description',
        'only_admin'
    ];

    // указываем тип данных
    protected $casts = [
        'only_admin' => 'boolean'
    ];

    // форматируем дату  в карбон объект 
    protected $dates = [
        'activated_at'
    ];

    // прописываем обратную связь
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'ACTIVE');
    }

    public function scopeDarft($query)
    {
        return $query->where('status', 'DRAFT');
    }
}



