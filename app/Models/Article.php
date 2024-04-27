<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'cover_image', 'approved', 'user_id', 'link',
    ];

    /** 
     * Get the user who posted this article
    */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /** 
     * Get the Category of this article
     * 
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
