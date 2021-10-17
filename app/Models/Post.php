<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $connection = 'mongodb';
    // protected $collection = 'posts';
    protected $fillable = ['title', 'slug', 'content', 'user_id', 'tags'];
    protected $hidden = ['user_id'];
    protected $with = ['user', 'tags'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts = [
        'id' => 'string',
        'created_at' => 'datetime',
    ];

    protected static function boot(){
        parent::boot();

        static::created(function ($post) {
            $post->update(['slug' =>  $post->title]);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setSlugAttribute($value){
        if (static::whereSlug($slug = Str::slug($value))->exists()){
           $slug = Str::slug($value).'-'.substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
        }
        $this->attributes['slug'] = $slug;
    }

    public function setUserIdAttribute()
    {
        if(Auth::check()){
            $this->attributes['user_id'] = Auth::id();
        }
    }

    public function getCreatedAtAttribute($value)
    {
        return \Illuminate\Support\Carbon::parse(date("Y-m-d H:i:s",strtotime($value.' UTC')))->format('F d, Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
}
