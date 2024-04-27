<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
	* @var string
    */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'link' ];

    /**
     * Get the articles that have this tag
     *
     * @return App\Models\Article $articles
     */
    public function articles()
    {
        return $this->belongsToMany('App\Models\Article');
    }
}
