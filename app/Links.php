<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{

    protected $table = 'links';

    protected $fillable = [
        'category_id', 'user_id', 'title', 'url',
        'description', 'published', 'published_at'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'published_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function hostName()
    {
        return parse_url($this->url, PHP_URL_HOST);
    }

    public function getSlugAttribute($value)
    {
        return str_slug($this->id.' '.$this->title);
    }

    public function getTitleAttribute($value)
    {
        // Make everything in quotes italic
        $value = preg_replace('/(\"[^\"]+\")/', '<i>$1</i>', $value);
        // Make everything between () italic
        $value = preg_replace('/(\([^\(\)]+\))/', '<i>$1</i>', $value);
        // Replace two dashes with emdash
        $value = str_replace('--', '—', $value);
        // Replace & with styled version
        $value = str_replace('&', '<i>&amp;</i>', $value);

        return $value;
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public static function recent($paginate = 15)
    {
        return Links::with('user', 'category')
            ->published()
            ->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate($paginate);
    }
}
