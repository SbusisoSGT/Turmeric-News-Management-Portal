<?php

namespace App\Policies;

use App\Models\User;

class ArticlePolicy
{

    /**
     * Determine whether the user can write articles.
     * 
     * @param App\Models\User $user
     * @return boolean
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Author');
    }

    /**
     * Determine whether the user can approve published articles.
     * 
     * @param App\Models\User $user
     * @return boolean
     */
    public function approve(User $user): bool
    {
        return $user->hasRole('Admin');
    }

     /**
     * Determine whether the user can delete published articles.
     * 
     * @param App\Models\User $user
     * @return boolean
     */
    public function delete(User $user): bool
    {
        return $user->hasRole('Admin');
    }
}
