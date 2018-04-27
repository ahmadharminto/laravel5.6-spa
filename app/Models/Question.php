<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // protected $guarded = [];

    protected $fillable = [
        'title',
        'slug',
        'body',
        'user_id',
        'category_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($question) {
            $question->slug = str_slug($question->title);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute()
    {
        return "question/$this->slug";
    }
}
