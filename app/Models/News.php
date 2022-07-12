<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;


class News extends Model
{
    use HasFactory, Sluggable, Searchable;

    protected $table = "news";

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'slug',
        'image',
        'status',
        'description',
        'only_admin',
        'source_id',
        'creared_at'
    ];

    // указываем тип данных
    protected $casts = [
        'only_admin' => 'boolean'
    ];

    // форматируем дату  в карбон объект
    protected $dates = [
        'created_at'
    ];

    // прописываем обратную связь
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


      public function source(): BelongsTo
      {
          return $this->belongsTo(Source::class, 'source_id', 'id');
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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        return array('id' => $array['id'],'description' => $array['description']);
    }
}



