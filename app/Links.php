<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{

    protected $table = 'links';

    protected $fillable = ['category_id', 'user_id', 'title', 'url', 'description', 'published', 'word_count', 'image_url', 'published_at'];

    protected $dates = ['created_at', 'updated_at', 'published_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
