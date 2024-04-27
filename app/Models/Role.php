<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * 
     * @var string
     */
    public $timestamps = false;

    /**
     * Get the users who have this role
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
