<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;





class Post extends Model
{
    use HasFactory;

    
    public function user(){

        return $this->belongsTo(User::class);
    }

    protected $fillable = ['title', 'description','image_path','user_id'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title); // You can customize this logic as needed
        });
    }
}
