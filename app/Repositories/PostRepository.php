<?php

namespace App\Repositories;

use App\User;

class PostRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->posts()
			        ->orderBy('created_at', 'DESC')
			        ->get();
	}
}